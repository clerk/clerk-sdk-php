<?php

namespace Clerk\Backend\Helpers\Jwks;

use Clerk\Backend\Utils;
use Exception;
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Crypt\RSA;
use phpseclib3\Math\BigInteger;
use Speakeasy\Serializer\DeserializationContext;
use stdClass;

class VerifyToken
{
    /**
     * Verifies the given JWT token.
     *
     * @param  string  $token  The JWT token to verify.
     * @param  VerifyTokenOptions  $options  The options to use for the verification.
     * @return stdClass The payload of the verified token.
     *
     * @throws TokenVerificationException If the token could not be verified.
     */
    public static function verifyToken(string $token, VerifyTokenOptions $options): stdClass
    {
        $publicKey = $options->getJwtKey() !== null
            ? self::getLocalJwtKey($options->getJwtKey())
            : self::getRemoteJwtKey($token, $options);

        JWT::$leeway = $options->getClockSkewInMs() / 1000;

        try {
            $payload = JWT::decode($token, new Key($publicKey, 'RS256'));
        } catch (ExpiredException $ex) {
            throw new TokenVerificationException(TokenVerificationErrorReason::$TOKEN_EXPIRED, $ex);
        } catch (BeforeValidException $ex) {
            // either the token is not yet eligle ('nbf' claim) or if it's not been created yet ('iat' claim)
            $payload = $ex->getPayload();

            if (isset($payload->nbf) && time() < $payload->nbf) {
                throw new TokenVerificationException(TokenVerificationErrorReason::$TOKEN_NOT_ACTIVE_YET, $ex);
            }

            if (isset($payload->iat) && time() < $payload->iat) {
                throw new TokenVerificationException(TokenVerificationErrorReason::$TOKEN_IAT_IN_THE_FUTURE, $ex);
            }

            throw $ex;

        } catch (SignatureInvalidException $ex) {
            throw new TokenVerificationException(TokenVerificationErrorReason::$TOKEN_INVALID_SIGNATURE, $ex);
        } catch (Exception $ex) {
            throw new TokenVerificationException(TokenVerificationErrorReason::$TOKEN_INVALID, $ex);
        }

        if ($options->getAudiences() !== null) {
            if (isset($payload->aud) && ! in_array($payload->aud, $options->getAudiences())) {
                throw new TokenVerificationException(TokenVerificationErrorReason::$TOKEN_INVALID_AUDIENCE);
            }
        }

        if ($options->getAuthorizedParties() !== null) {
            if (isset($payload->azp) && ! in_array($payload->azp, $options->getAuthorizedParties())) {
                throw new TokenVerificationException(TokenVerificationErrorReason::$TOKEN_INVALID_AUTHORIZED_PARTIES);
            }
        }

        // Process organization claims if present
        if (isset($payload->v) && $payload->v === '2' && isset($payload->o) && is_object($payload->o)) {
            $orgClaims = $payload->o;
            
            // Add derived organization claims
            if (isset($orgClaims->id)) {
                $payload->org_id = $orgClaims->id;
            }
            if (isset($orgClaims->slg)) {
                $payload->org_slug = $orgClaims->slg;
            }
            if (isset($orgClaims->rol)) {
                $payload->org_roles = $orgClaims->rol;
            }

            // Compute and add org_permissions if features and permissions are present
            if (isset($payload->fea) && isset($orgClaims->per) && isset($orgClaims->fpm)) {
                $features = explode(',', $payload->fea);
                $permissions = explode(',', $orgClaims->per);
                $mappings = explode(',', $orgClaims->fpm);
                
                $orgPermissions = [];
                for ($idx = 0; $idx < count($mappings); $idx++) {
                    $mapping = $mappings[$idx];
                    $featureParts = explode(':', $features[$idx]);
                    
                    if (count($featureParts) !== 2) {
                        continue;
                    }
                    
                    $scope = $featureParts[0];
                    $feature = $featureParts[1];
                    
                    if (!str_contains($scope, 'o')) {
                        continue;
                    }
                    
                    $binary = ltrim(decbin((int)$mapping), '0');
                    $reversedBinary = strrev($binary);
                    
                    for ($i = 0; $i < strlen($reversedBinary); $i++) {
                        if ($reversedBinary[$i] === '1' && $i < count($permissions)) {
                            $orgPermissions[] = "org:{$feature}:{$permissions[$i]}";
                        }
                    }
                }
                
                if (!empty($orgPermissions)) {
                    $payload->org_permissions = $orgPermissions;
                }
            }
        }

        return $payload;
    }

    private static function getLocalJwtKey(string $jwtKey): string
    {
        try {
            $rsaKey = PublicKeyLoader::load($jwtKey);
            $stringKey = $rsaKey->toString('PKCS8');

            /** @phpstan-ignore-next-line */
            return $stringKey;
        } catch (Exception $ex) {
            throw new TokenVerificationException(TokenVerificationErrorReason::$JWK_LOCAL_INVALID, $ex);
        }
    }

    private static function getRemoteJwtKey(string $token, VerifyTokenOptions $options): string
    {
        $kid = self::parseKid($token);

        $jwks = self::fetchJwks($options);
        if ($jwks->keys === null) {
            throw new TokenVerificationException(TokenVerificationErrorReason::$JWK_REMOTE_INVALID);
        }

        foreach ($jwks->keys as $key) {
            if ($key->kid === $kid) {
                if ($key->n === null || $key->e === null) {
                    throw new TokenVerificationException(TokenVerificationErrorReason::$JWK_REMOTE_INVALID);
                }
                try {
                    $rsaModulus = JWT::urlsafeB64Decode($key->n);
                    $rsaExponent = JWT::urlsafeB64Decode($key->e);
                    $rsaKey = RSA::loadPublicKey([
                        'n' => new BigInteger($rsaModulus, 256),
                        'e' => new BigInteger($rsaExponent, 256),
                    ]);

                    return $rsaKey->toString('PKCS8');
                } catch (Exception $ex) {
                    throw new TokenVerificationException(TokenVerificationErrorReason::$JWK_FAILED_TO_RESOLVE, $ex);
                }
            }
        }

        throw new TokenVerificationException(TokenVerificationErrorReason::$JWK_KID_MISMATCH);
    }

    private static function parseKid(string $token): string
    {
        try {
            $decodedHeader = JWT::jsonDecode(JWT::urlsafeB64Decode(explode('.', $token)[0]));
            if (isset($decodedHeader->kid)) {
                return $decodedHeader->kid;
            }
        } catch (Exception $ex) {
            throw new TokenVerificationException(TokenVerificationErrorReason::$TOKEN_INVALID, $ex);
        }

        throw new TokenVerificationException(TokenVerificationErrorReason::$JWK_KID_MISMATCH);
    }

    private static function fetchJwks(VerifyTokenOptions $options): \Clerk\Backend\Models\Components\Jwks
    {
        if ($options->getSecretKey() === null) {
            throw new TokenVerificationException(TokenVerificationErrorReason::$SECRET_KEY_MISSING);
        }

        $client = new Client();
        try {
            $response = $client->request('GET', "{$options->getApiUrl()}/{$options->getApiVersion()}/jwks", [
                'headers' => [
                    'Authorization' => "Bearer {$options->getSecretKey()}",
                ],
            ]);
        } catch (ClientException $ex) {
            throw new TokenVerificationException(TokenVerificationErrorReason::$JWK_FAILED_TO_LOAD, $ex);
        }

        try {
            $serializer = Utils\JSON::createSerializer();
            $wellKnownJWKS = $serializer->deserialize((string) $response->getBody(), '\Clerk\Backend\Models\Components\Jwks', 'json', DeserializationContext::create()->setRequireAllRequiredProperties(true));

        } catch (Exception $ex) {
            throw new TokenVerificationException(TokenVerificationErrorReason::$JWK_FAILED_TO_LOAD, $ex);
        }

        if ($wellKnownJWKS === null) {
            throw new TokenVerificationException(TokenVerificationErrorReason::$JWK_REMOTE_INVALID);
        }

        return $wellKnownJWKS;
    }
}

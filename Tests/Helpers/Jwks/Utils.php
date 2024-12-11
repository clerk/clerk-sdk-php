<?php

namespace Clerk\Backend\Tests\Helpers\Jwks;

use Clerk\Backend\Helpers\Jwks\RequestState;
use Clerk\Backend\Helpers\Jwks\TokenVerificationErrorReason;
use Clerk\Backend\Helpers\Jwks\TokenVerificationException;
use Clerk\Backend\Helpers\Jwks\VerifyToken;
use Clerk\Backend\Helpers\Jwks\VerifyTokenOptions;
use DateTimeImmutable;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use phpseclib3\Crypt\RSA;
use PHPUnit\Framework\TestCase;

class Utils
{
    public static function skipIfEnvVarsNotSet(TestCase $test, array $envVars)
    {
        $missingEnvVars = [];

        foreach ($envVars as $envVar) {
            if (getenv($envVar) === false) {
                $missingEnvVars[] = $envVar;
            }
        }

        if (! empty($missingEnvVars)) {
            $test->markTestSkipped('Missing environment variable(s): '.implode(', ', $missingEnvVars).'.');
        }
    }

    public static function generateTokenKeyPair(
        ?string $keyId = null,
        ?DateTimeImmutable $issuedAt = null,
        ?DateTimeImmutable $notBefore = null,
        ?DateTimeImmutable $expires = null,
        ?string $audience = null,
        ?string $authorizedParty = null
    ): array {
        $rsa = RSA::createKey(2048);
        $privateKey = $rsa->withPadding(RSA::SIGNATURE_PKCS1);
        $publicKey = $privateKey->getPublicKey();

        $defaultIssuedAt = (new DateTimeImmutable('-1 minute'))->getTimeStamp();
        // WARNING: The iat claim is only checked if the nbf claim is not present
        // https://github.com/firebase/php-jwt/blob/main/src/JWT.php#L166
        $defaultNotBefore = ! $issuedAt ? (new DateTimeImmutable())->getTimeStamp() : null;
        $defaultExpires = (new DateTimeImmutable('+1 minute'))->getTimeStamp();
        $defaultKeyId = 'ins_abcdefghijklmnopqrstuvwxyz0';

        $payload = [
            'iss' => 'https://test.com',
            'aud' => $audience,
            'iat' => $issuedAt ? $issuedAt->getTimestamp() : $defaultIssuedAt,
            'nbf' => $notBefore ? $notBefore->getTimestamp() : $defaultNotBefore,
            'exp' => $expires ? $expires->getTimeStamp() : $defaultExpires,
            'name' => 'Test',
        ];

        if ($authorizedParty) {
            $payload['azp'] = $authorizedParty;
        }

        $jwt = JWT::encode($payload, $privateKey, 'RS256', $keyId ?? $defaultKeyId);
        $publicKeyPem = $publicKey->toString('PKCS8');

        return [$jwt, $publicKeyPem];
    }

    public static function assertPayload(TestCase $test, $sessionToken, VerifyTokenOptions $options): void
    {
        $expired = false;
        $payload = null;

        try {
            $payload = VerifyToken::verifyToken($sessionToken, $options);
        } catch (TokenVerificationException $ex) {
            if ($ex->getReason() !== TokenVerificationErrorReason::$TOKEN_EXPIRED) {
                throw $ex;
            }
            $test->assertInstanceOf(ExpiredException::class, $ex->getPrevious());
            echo "WARNING: the provided token is expired!\n";
            $expired = true;
        }

        if (! $expired) {
            $test->assertNotNull($payload);
            $test->assertTrue(isset($payload->iss));
        }
    }

    public static function assertState(TestCase $test, RequestState $state, string $token): void
    {
        if ($state->isSignedIn()) {
            $test->assertNull($state->getErrorReason());
            $test->assertEquals($token, $state->getToken());
            $test->assertNotNull($state->getPayload());
        } else {
            $test->assertEquals(TokenVerificationErrorReason::$TOKEN_EXPIRED, $state->getErrorReason());
            $test->assertNull($state->getToken());
            $test->assertNull($state->getPayload());
            echo "WARNING: the provided token is expired!\n";
        }
    }
}

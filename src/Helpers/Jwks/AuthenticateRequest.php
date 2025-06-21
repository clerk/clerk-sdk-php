<?php

namespace Clerk\Backend\Helpers\Jwks;

/**
 * Helper methods to authenticate requests.
 */
class AuthenticateRequest
{
    private const SESSION_COOKIE_NAME = '__session';

    /**
     * Checks if the HTTP request is authenticated.
     * First the session token is retrieved from either the __session cookie
     * or the HTTP Authorization header.
     * Then the session token is verified: networklessly if the options.jwtKey
     * is provided, otherwise by fetching the JWKS from Clerk's Backend API.
     *
     * WARNING: authenticateRequest is applicable in the context of Backend APIs only.
     *
     * @param  mixed  $request  The HTTP request to be authenticated.
     * @param  AuthenticateRequestOptions  $options  The request authentication options.
     * @return RequestState The request state.
     *
     * @throws AuthenticateRequestException If the session token or secret key is missing.
     */
    public static function authenticateRequest(
        mixed $request,
        AuthenticateRequestOptions $options
    ): RequestState {
        $sessionToken = self::getSessionToken($request);
        if ($sessionToken === null) {
            return RequestState::signedOut(AuthErrorReason::$SESSION_TOKEN_MISSING);
        }

        $tokenType = TokenTypes::getTokenType($sessionToken);
        $tokenTypeName = TokenTypes::getTokenTypeName($sessionToken);

        // Check if token type is accepted
        if (!in_array('any', $options->getAcceptsToken()) && !in_array($tokenTypeName, $options->getAcceptsToken())) {
            return RequestState::signedOut(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED);
        }

        $verifyTokenOptions = null;

        if (TokenTypes::isMachineToken($sessionToken)) {
            // Machine tokens require secret key for API verification
            if ($options->getSecretKey() === null) {
                return RequestState::signedOut(AuthErrorReason::$SECRET_KEY_MISSING);
            }

            $verifyTokenOptions = new VerifyTokenOptions(
                secretKey: $options->getSecretKey()
            );
        } else {
            // Session tokens can use either JWT key or secret key
            if ($options->getJwtKey() !== null) {
                $verifyTokenOptions = new VerifyTokenOptions(
                    jwtKey: $options->getJwtKey(),
                    audiences: $options->getAudiences(),
                    authorizedParties: $options->getAuthorizedParties(),
                    clockSkewInMs: $options->getClockSkewInMs()
                );
            } elseif ($options->getSecretKey() !== null) {
                $verifyTokenOptions = new VerifyTokenOptions(
                    secretKey: $options->getSecretKey(),
                    audiences: $options->getAudiences(),
                    authorizedParties: $options->getAuthorizedParties(),
                    clockSkewInMs: $options->getClockSkewInMs()
                );
            } else {
                return RequestState::signedOut(AuthErrorReason::$SECRET_KEY_MISSING);
            }
        }

        try {
            $claims = VerifyToken::verifyToken($sessionToken, $verifyTokenOptions);

            return RequestState::signedIn($sessionToken, $claims);
        } catch (TokenVerificationException $e) {
            return RequestState::signedOut($e->getReason());
        }
    }

    /**
     * Retrieve token from __session cookie or Authorization header.
     *
     * @param  mixed  $request  The HTTP request
     * @return string|null The session token, if present
     */
    private static function getSessionToken(mixed $request): ?string
    {

        if (in_array('getHeader', get_class_methods($request))) {
            $authorizationHeaders = $request->hasHeader('Authorization') ? $request->getHeader('Authorization')[0] : null;
            $cookieHeaders = $request->hasHeader('Cookie') ? $request->getHeader('Cookie')[0] : null;
        } else {
            $authorizationHeaders = $request->headers->get('Authorization');
            $cookieHeaders = $request->headers->get('Cookie');
        }

        if (! empty($authorizationHeaders)) {
            return str_replace('Bearer ', '', $authorizationHeaders);

        }
        if (! empty($cookieHeaders)) {
            $cookies = array_map('trim', explode(';', $cookieHeaders));
            foreach ($cookies as $cookie) {
                [$name, $value] = explode('=', $cookie, 2);
                if (str_starts_with($name, self::SESSION_COOKIE_NAME)) {
                    return $value;
                }
            }
        }

        return null;
    }
}

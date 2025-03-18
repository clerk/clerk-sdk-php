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
        $authorizationHeader = self::getAuthorizationHeader($request);

        if (! empty($authorizationHeader)) {
            return str_replace('Bearer ', '', $authorizationHeader);
        }

        $cookieHeader = self::getCookieHeader($request);

        if (! empty($cookieHeader)) {
            $cookies = array_map('trim', explode(';', $cookieHeader));
            foreach ($cookies as $cookie) {
                [$name, $value] = explode('=', $cookie, 2);
                if (str_starts_with($name, self::SESSION_COOKIE_NAME)) {
                    return $value;
                }
            }
        }

        return null;
    }

    /**
     * Get Authorization header.
     *
     * @param  mixed  $request  The HTTP request
     * @return string|null The Authorization header, if present
     */
     private static function getAuthorizationHeader(mixed $request): ?string
    {
        if (method_exists($request, 'getHeader')) {
            return $request->hasHeader('Authorization')
                ? ($request->getHeader('Authorization')[0] ?? null)
                : null;
        } else {
            return $request->headers->get('Authorization');
        }
    }

    /**
     * Get Cookie header.
     *
     * @param  mixed  $request  The HTTP request
     * @return string|null The Cookie headers, if present
     */
     private static function getCookieHeader(mixed $request): ?string
    {
        if (method_exists($request, 'getHeader')) {
            return $request->hasHeader('Cookie')
                ? ($request->getHeader('Cookie')[0] ?? null)
                : null;
        } else {
            return $request->headers->get('Cookie');
        }
    }
}

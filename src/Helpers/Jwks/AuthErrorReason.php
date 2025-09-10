<?php

namespace Clerk\Backend\Helpers\Jwks;

/**
 * The reason for an AuthenticateRequestException being thrown.
 */
class AuthErrorReason
{
    public static ErrorReason $SESSION_TOKEN_MISSING;
    public static ErrorReason $SECRET_KEY_MISSING;
    public static ErrorReason $TOKEN_TYPE_NOT_SUPPORTED;

    public static function init(): void
    {
        self::$SESSION_TOKEN_MISSING = new ErrorReason(
            'session-token-missing',
            'Could not retrieve session token. Please make sure that the __session cookie or the HTTP authorization header contain a Clerk-generated session JWT'
        );
        self::$SECRET_KEY_MISSING = new ErrorReason(
            'secret-key-missing',
            'Missing Clerk Secret Key. Go to https://dashboard.clerk.com and get your key for your instance.'
        );
        self::$TOKEN_TYPE_NOT_SUPPORTED = new ErrorReason(
            'token-type-not-supported',
            'The provided token type is not supported. Expected one of: session_token, m2m_token, oauth_token, or api_key.'
        );
    }
}

// Initialize static properties
AuthErrorReason::init();

<?php

namespace Clerk\Backend\Helpers\Jwks;

/**
 * The reason for an AuthenticateRequestException being thrown.
 */
class AuthErrorReason
{
    public static ErrorReason $SESSION_TOKEN_MISSING;
    public static ErrorReason $SECRET_KEY_MISSING;

    public static function init()
    {
        self::$SESSION_TOKEN_MISSING = new ErrorReason(
            'session-token-missing',
            'Could not retrieve session token. Please make sure that the __session cookie or the HTTP authorization header contain a Clerk-generated session JWT'
        );
        self::$SECRET_KEY_MISSING = new ErrorReason(
            'secret-key-missing',
            'Missing Clerk Secret Key. Go to https://dashboard.clerk.com and get your key for your instance.'
        );
    }
}

// Initialize static properties
AuthErrorReason::init();

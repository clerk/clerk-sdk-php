<?php

namespace Clerk\Backend\Helpers\Jwks;

/**
 * The reason for a TokenVerificationException being thrown.
 */
class TokenVerificationErrorReason
{
    public static ErrorReason $JWK_FAILED_TO_LOAD;
    public static ErrorReason $JWK_REMOTE_INVALID;
    public static ErrorReason $JWK_LOCAL_INVALID;
    public static ErrorReason $JWK_FAILED_TO_RESOLVE;
    public static ErrorReason $JWK_KID_MISMATCH;
    public static ErrorReason $TOKEN_EXPIRED;
    public static ErrorReason $TOKEN_INVALID;
    public static ErrorReason $TOKEN_INVALID_AUTHORIZED_PARTIES;
    public static ErrorReason $TOKEN_INVALID_AUDIENCE;
    public static ErrorReason $TOKEN_IAT_IN_THE_FUTURE;
    public static ErrorReason $TOKEN_NOT_ACTIVE_YET;
    public static ErrorReason $TOKEN_INVALID_SIGNATURE;
    public static ErrorReason $SECRET_KEY_MISSING;

    public static function init()
    {
        self::$JWK_FAILED_TO_LOAD = new ErrorReason(
            'jwk-failed-to-load',
            'Failed to load JWKS from Clerk Backend API. Contact support@clerk.com.'
        );
        self::$JWK_REMOTE_INVALID = new ErrorReason(
            'jwk-remote-invalid',
            'The JWKS endpoint did not contain any signing keys. Contact support@clerk.com.'
        );
        self::$JWK_LOCAL_INVALID = new ErrorReason(
            'jwk-local-invalid',
            'The provided PEM Public Key is not in the proper format.'
        );
        self::$JWK_FAILED_TO_RESOLVE = new ErrorReason(
            'jwk-failed-to-resolve',
            'Failed to resolve JWK. Public Key is not in the proper format.'
        );
        self::$JWK_KID_MISMATCH = new ErrorReason(
            'jwk-kid-mismatch',
            'Unable to find a signing key in JWKS that matches the kid of the provided session token.'
        );
        self::$TOKEN_EXPIRED = new ErrorReason(
            'token-expired',
            'Token has expired and is no longer valid.'
        );
        self::$TOKEN_INVALID = new ErrorReason(
            'token-invalid',
            'Token is invalid and could not be verified.'
        );
        self::$TOKEN_INVALID_AUTHORIZED_PARTIES = new ErrorReason(
            'token-invalid-authorized-parties',
            'Authorized party claim (azp) does not match any of the authorized parties.'
        );
        self::$TOKEN_INVALID_AUDIENCE = new ErrorReason(
            'token-invalid-audience',
            'Token audience claim (aud) does not match one of the expected audience values.'
        );
        self::$TOKEN_IAT_IN_THE_FUTURE = new ErrorReason(
            'token-iat-in-the-future',
            'Token Issued At claim (iat) represents a time in the future.'
        );
        self::$TOKEN_NOT_ACTIVE_YET = new ErrorReason(
            'token-not-active-yet',
            'Token is not yet valid. Not Before claim (nbf) is in the future.'
        );
        self::$TOKEN_INVALID_SIGNATURE = new ErrorReason(
            'token-invalid-signature',
            'Token signature is invalid and could not be verified.'
        );
        self::$SECRET_KEY_MISSING = new ErrorReason(
            'secret-key-missing',
            'Missing Clerk Secret Key. Go to https://dashboard.clerk.com and get your key for your instance.'
        );
    }
}

// Initialize static properties
TokenVerificationErrorReason::init();

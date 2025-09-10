<?php

namespace Clerk\Backend\Helpers\Jwks;

/**
 * Helper class to identify and work with different token types.
 */
class TokenTypes
{
    public const SESSION_TOKEN = 'session_token';
    public const MACHINE_TOKEN = 'machine_token';
    public const OAUTH_TOKEN = 'oauth_token';
    public const API_KEY = 'api_key';
    public const UNKNOWN = 'unknown';

    /**
     * Get the token type based on the token prefix.
     *
     * @param  string  $token  The token to analyze
     * @return string The token type
     */
    public static function getTokenType(string $token): string
    {
        if (empty($token)) {
            return self::UNKNOWN;
        }

        // Machine tokens start with 'mt_' or 'm2m_'
        if (str_starts_with($token, 'mt_') || str_starts_with($token, 'm2m_')) {
            return self::MACHINE_TOKEN;
        }

        // OAuth tokens start with 'oat_'
        if (str_starts_with($token, 'oat_')) {
            return self::OAUTH_TOKEN;
        }

        // API keys start with 'ak_'
        if (str_starts_with($token, 'ak_')) {
            return self::API_KEY;
        }

        // Session tokens are JWTs (start with 'eyJ')
        if (str_starts_with($token, 'eyJ')) {
            return self::SESSION_TOKEN;
        }

        return self::UNKNOWN;
    }

    /**
     * Check if the token is a machine token.
     *
     * @param  string  $token  The token to check
     * @return bool True if it's a machine token
     */
    public static function isMachineToken(string $token): bool
    {
        return self::getTokenType($token) === self::MACHINE_TOKEN;
    }

    /**
     * Check if the token is an OAuth token.
     *
     * @param  string  $token  The token to check
     * @return bool True if it's an OAuth token
     */
    public static function isOAuthToken(string $token): bool
    {
        return self::getTokenType($token) === self::OAUTH_TOKEN;
    }

    /**
     * Check if the token is an API key.
     *
     * @param  string  $token  The token to check
     * @return bool True if it's an API key
     */
    public static function isApiKey(string $token): bool
    {
        return self::getTokenType($token) === self::API_KEY;
    }

    /**
     * Check if the token is a session token.
     *
     * @param  string  $token  The token to check
     * @return bool True if it's a session token
     */
    public static function isSessionToken(string $token): bool
    {
        return self::getTokenType($token) === self::SESSION_TOKEN;
    }

    /**
     * Get the token type name for display purposes.
     *
     * @param  string  $token  The token to analyze
     * @return string The token type name
     */
    public static function getTokenTypeName(string $token): string
    {
        $type = self::getTokenType($token);

        return match ($type) {
            self::SESSION_TOKEN => 'session_token',
            self::MACHINE_TOKEN => 'm2m_token',
            self::OAUTH_TOKEN => 'oauth_token',
            self::API_KEY => 'api_key',
            default => $type
        };
    }
}
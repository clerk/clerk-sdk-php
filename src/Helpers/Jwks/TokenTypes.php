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

        // Machine tokens start with 'mt_'
        if (str_starts_with($token, 'mt_')) {
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
            self::MACHINE_TOKEN => 'machine_token',
            self::OAUTH_TOKEN => 'oauth_token',
            self::API_KEY => 'api_key',
            default => $type
        };
    }
}

interface AuthObject
{
}

class SessionAuthObjectV1 implements AuthObject
{
    public string $session_id;
    public string $user_id;
    public ?string $org_id;
    public ?string $org_role;
    public ?array $org_permissions;
    public ?array $factor_verification_age;
    public ?array $claims;

    public function __construct(array $payload)
    {
        $this->session_id = $payload['sid'] ?? '';
        $this->user_id = $payload['sub'] ?? '';
        $this->org_id = $payload['org_id'] ?? null;
        $this->org_role = $payload['org_role'] ?? null;
        $this->org_permissions = $payload['org_permissions'] ?? null;
        $this->factor_verification_age = $payload['fva'] ?? null;
        $this->claims = $payload;
    }
}

class SessionAuthObjectV2 implements AuthObject
{
    public int $exp;
    public int $iat;
    public string $iss;
    public string $sid;
    public string $sub;
    public int $v;
    public ?string $jti;
    public ?string $role;
    public ?array $fva;
    public ?int $nbf;
    public ?string $email;
    public ?string $azp;

    public function __construct(array $payload)
    {
        $this->exp = $payload['exp'] ?? 0;
        $this->iat = $payload['iat'] ?? 0;
        $this->iss = $payload['iss'] ?? '';
        $this->sid = $payload['sid'] ?? '';
        $this->sub = $payload['sub'] ?? '';
        $this->v = $payload['v'] ?? 1;
        $this->jti = $payload['jti'] ?? null;
        $this->role = $payload['role'] ?? null;
        $this->fva = $payload['fva'] ?? null;
        $this->nbf = $payload['nbf'] ?? null;
        $this->email = $payload['email'] ?? null;
        $this->azp = $payload['azp'] ?? null;
    }
}

class OAuthMachineAuthObject implements AuthObject
{
    public string $token_type = 'oauth_token';
    public ?string $id;
    public ?string $user_id;
    public ?string $client_id;
    public ?string $name;
    public ?array $scopes;

    public function __construct(array $payload)
    {
        $this->id = $payload['id'] ?? null;
        $this->user_id = $payload['subject'] ?? null;
        $this->client_id = $payload['client_id'] ?? null;
        $this->name = $payload['name'] ?? null;
        $this->scopes = $payload['scopes'] ?? null;
    }
}

class APIKeyMachineAuthObject implements AuthObject
{
    public string $token_type = 'api_key';
    public ?string $id;
    public ?string $user_id;
    public ?string $org_id;
    public ?string $name;
    public ?array $scopes;
    public ?array $claims;

    public function __construct(array $payload)
    {
        $this->id = $payload['id'] ?? null;
        $this->user_id = $payload['subject'] ?? null;
        $this->org_id = $payload['org_id'] ?? null;
        $this->name = $payload['name'] ?? null;
        $this->scopes = $payload['scopes'] ?? null;
        $this->claims = $payload['claims'] ?? null;
    }
}

class M2MMachineAuthObject implements AuthObject
{
    public string $token_type = 'machine_token';
    public ?string $id;
    public ?string $machine_id;
    public ?string $client_id;
    public ?string $name;
    public ?array $scopes;
    public ?array $claims;

    public function __construct(array $payload)
    {
        $this->id = $payload['id'] ?? null;
        $this->machine_id = $payload['subject'] ?? null;
        $this->client_id = $payload['client_id'] ?? null;
        $this->name = $payload['name'] ?? null;
        $this->scopes = $payload['scopes'] ?? null;
        $this->claims = $payload['claims'] ?? null;
    }
}
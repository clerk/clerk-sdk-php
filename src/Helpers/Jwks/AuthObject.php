<?php

namespace Clerk\Backend\Helpers\Jwks;

interface AuthObject {}

class SessionAuthObjectV1 implements AuthObject {
    public string $session_id;
    public string $user_id;
    public ?string $org_id;
    public ?string $org_role;
    public ?array $org_permissions;
    public ?array $factor_verification_age;
    public ?array $claims;

    public function __construct(array $payload) {
        $this->session_id = $payload['sid'] ?? '';
        $this->user_id = $payload['sub'] ?? '';
        $this->org_id = $payload['org_id'] ?? null;
        $this->org_role = $payload['org_role'] ?? null;
        $this->org_permissions = $payload['org_permissions'] ?? null;
        $this->factor_verification_age = $payload['fva'] ?? null;
        $this->claims = $payload;
    }
}

class SessionAuthObjectV2 implements AuthObject {
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

    public function __construct(array $payload) {
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

class OAuthMachineAuthObject implements AuthObject {
    public string $token_type = 'oauth_token';
    public ?string $id;
    public ?string $user_id;
    public ?string $client_id;
    public ?string $name;
    public ?array $scopes;

    public function __construct(array $payload) {
        $this->id = $payload['id'] ?? null;
        $this->user_id = $payload['subject'] ?? null;
        $this->client_id = $payload['client_id'] ?? null;
        $this->name = $payload['name'] ?? null;
        $this->scopes = $payload['scopes'] ?? null;
    }
}

class APIKeyMachineAuthObject implements AuthObject {
    public string $token_type = 'api_key';
    public ?string $id;
    public ?string $user_id;
    public ?string $org_id;
    public ?string $name;
    public ?array $scopes;
    public ?array $claims;

    public function __construct(array $payload) {
        $this->id = $payload['id'] ?? null;
        $this->user_id = $payload['subject'] ?? null;
        $this->org_id = $payload['org_id'] ?? null;
        $this->name = $payload['name'] ?? null;
        $this->scopes = $payload['scopes'] ?? null;
        $this->claims = $payload['claims'] ?? null;
    }
}

class M2MMachineAuthObject implements AuthObject {
    public string $token_type = 'machine_token';
    public ?string $id;
    public ?string $machine_id;
    public ?string $client_id;
    public ?string $name;
    public ?array $scopes;
    public ?array $claims;

    public function __construct(array $payload) {
        $this->id = $payload['id'] ?? null;
        $this->machine_id = $payload['subject'] ?? null;
        $this->client_id = $payload['client_id'] ?? null;
        $this->name = $payload['name'] ?? null;
        $this->scopes = $payload['scopes'] ?? null;
        $this->claims = $payload['claims'] ?? null;
    }
} 
<?php

namespace Clerk\Backend\Helpers\Jwks;

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
    /**
     * @var array<string>
     */
    public ?array $fva = null;
    public ?int $nbf;
    public ?string $email;
    public ?string $azp;

    /**
     * @param  array<string, mixed>  $payload
     */
    public function __construct(array $payload)
    {
        $this->exp = $payload['exp'] ?? 0;
        $this->iat = $payload['iat'] ?? 0;
        $this->iss = $payload['iss'] ?? '';
        $this->sid = $payload['sid'] ?? '';
        $this->sub = $payload['sub'] ?? '';
        $this->v = $payload['v'] ?? 0;
        $this->jti = $payload['jti'] ?? null;
        $this->role = $payload['role'] ?? null;
        $this->fva = $payload['fva'] ?? null;
        $this->nbf = $payload['nbf'] ?? null;
        $this->email = $payload['email'] ?? null;
        $this->azp = $payload['azp'] ?? null;
    }
} 
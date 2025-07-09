<?php

namespace Clerk\Backend\Helpers\Jwks;

class SessionAuthObjectV1 implements AuthObject
{
    public string $session_id;
    public string $user_id;
    public ?string $org_id;
    public ?string $org_role;
    /**
     * @var array<string>
     */
    public ?array $org_permissions = null;
    /**
     * @var array<int>
     */
    public ?array $factor_verification_age = null;
    /**
     * @var array<string, mixed>
     */
    public ?array $claims = null;

    /**
     * @param  array<string, mixed>  $payload
     */
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
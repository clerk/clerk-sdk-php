<?php

namespace Clerk\Backend\Helpers\Jwks;

class APIKeyMachineAuthObject implements AuthObject
{
    public string $token_type = 'api_key';
    public ?string $id;
    public ?string $user_id;
    public ?string $org_id;
    public ?string $name;
    /**
     * @var array<string>
     */
    public ?array $scopes = null;
    /**
     * @var array<string, mixed>
     */
    public ?array $claims = null;

    /**
     * @param  array<string, mixed>  $payload
     */
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
<?php

namespace Clerk\Backend\Helpers\Jwks;

class M2MMachineAuthObject implements AuthObject
{
    public string $token_type = 'machine_token';
    public ?string $id;
    public ?string $machine_id;
    public ?string $client_id;
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
        $this->machine_id = $payload['subject'] ?? null;
        $this->client_id = $payload['client_id'] ?? null;
        $this->name = $payload['name'] ?? null;
        $this->scopes = $payload['scopes'] ?? null;
        $this->claims = $payload['claims'] ?? null;
    }
} 
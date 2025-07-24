<?php

namespace Clerk\Backend\Helpers\Jwks;

class OAuthMachineAuthObject implements AuthObject
{
    public string $token_type = 'oauth_token';
    public ?string $id;
    public ?string $user_id;
    public ?string $client_id;
    public ?string $name;
    /**
     * @var array<string>
     */
    public ?array $scopes = null;

    /**
     * @param  array<string, mixed>  $payload
     */
    public function __construct(array $payload)
    {
        $this->id = $payload['id'] ?? null;
        $this->user_id = $payload['subject'] ?? null;
        $this->client_id = $payload['client_id'] ?? null;
        $this->name = $payload['name'] ?? null;
        $this->scopes = $payload['scopes'] ?? null;
    }
}
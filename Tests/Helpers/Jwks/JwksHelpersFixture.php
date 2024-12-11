<?php

namespace Clerk\Backend\Tests\Helpers\Jwks;

class JwksHelpersFixture
{
    public string $requestUrl = 'http://localhost:3000';

    public ?string $secretKey;
    public ?string $jwtKey;
    public string $sessionToken;
    public ?string $apiUrl;
    public ?array $audiences;
    public ?string $authorizedParty;

    public string $testToken;
    public string $testJwtKey;

    public function __construct()
    {
        $this->secretKey = getenv('CLERK_SECRET_KEY') ?: null;
        $this->jwtKey = getenv('CLERK_JWT_KEY') ?: null;
        $this->apiUrl = getenv('CLERK_API_URL') ?: null;
        $this->sessionToken = getenv('CLERK_SESSION_TOKEN') ?: '';
        $this->audiences = null;
        $this->authorizedParty = $this->requestUrl;

        [$this->testToken, $this->testJwtKey] = Utils::generateTokenKeyPair(
            'ins_abcdefghijklmnopqrstuvwxyz0',
            new \DateTimeImmutable('-1 minute'),
            new \DateTimeImmutable(),
            new \DateTimeImmutable('+1 minute'),
            $this->requestUrl,
            $this->authorizedParty
        );
    }
}

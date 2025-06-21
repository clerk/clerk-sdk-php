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
    public ?string $machineToken;
    public ?string $oauthToken;
    public ?string $apiKey;
    public ?string $testAudience;
    public bool $enableRealIntegrationTests;

    public string $testToken;
    public string $testJwtKey;

    public function __construct()
    {
        // Load environment variables from .env file if it exists
        $this->loadEnvironmentVariables();

        $this->secretKey = getenv('CLERK_SECRET_KEY') ?: null;
        $this->jwtKey = getenv('CLERK_JWT_KEY') ?: null;
        $this->apiUrl = getenv('CLERK_API_URL') ?: null;
        $this->sessionToken = getenv('CLERK_SESSION_TOKEN') ?: '';
        $this->machineToken = getenv('CLERK_MACHINE_TOKEN') ?: null;
        $this->oauthToken = getenv('CLERK_OAUTH_TOKEN') ?: null;
        $this->apiKey = getenv('CLERK_API_KEY') ?: null;
        $this->testAudience = getenv('CLERK_TEST_AUDIENCE') ?: 'test-api';
        $this->enableRealIntegrationTests = strtolower(getenv('ENABLE_REAL_INTEGRATION_TESTS') ?: 'false') === 'true';
        
        $this->audiences = null;
        $this->authorizedParty = getenv('CLERK_TEST_AUTHORIZED_PARTY') ?: $this->requestUrl;

        [$this->testToken, $this->testJwtKey] = Utils::generateTokenKeyPair(
            'ins_abcdefghijklmnopqrstuvwxyz0',
            new \DateTimeImmutable('-1 minute'),
            new \DateTimeImmutable(),
            new \DateTimeImmutable('+1 minute'),
            $this->requestUrl,
            $this->authorizedParty
        );
    }

    private function loadEnvironmentVariables(): void
    {
        $currentDir = getcwd();
        $envPath = $currentDir . '/.env';

        // If .env is not found in current directory, look for it in parent directories
        while (!file_exists($envPath) && dirname($currentDir) !== $currentDir) {
            $currentDir = dirname($currentDir);
            $envPath = $currentDir . '/.env';
        }

        if (file_exists($envPath)) {
            $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos($line, '#') === 0) {
                    continue; // Skip comments
                }
                
                if (strpos($line, '=') !== false) {
                    [$key, $value] = explode('=', $line, 2);
                    $key = trim($key);
                    $value = trim($value);
                    
                    // Remove quotes if present
                    if ((strpos($value, '"') === 0 && strrpos($value, '"') === strlen($value) - 1) ||
                        (strpos($value, "'") === 0 && strrpos($value, "'") === strlen($value) - 1)) {
                        $value = substr($value, 1, -1);
                    }
                    
                    if (!getenv($key)) {
                        putenv("$key=$value");
                        $_ENV[$key] = $value;
                    }
                }
            }
        }
    }
}

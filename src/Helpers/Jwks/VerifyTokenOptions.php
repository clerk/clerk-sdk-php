<?php

namespace Clerk\Backend\Helpers\Jwks;

class VerifyTokenOptions
{
    private const DEFAULT_CLOCK_SKEW_MS = 5000;
    private const DEFAULT_API_URL = 'https://api.clerk.com';
    private const DEFAULT_API_VERSION = 'v1';

    private ?string $secretKey;
    private ?string $jwtKey;
    private ?array $audiences;
    private ?array $authorizedParties;
    private int $clockSkewInMs;
    private string $apiUrl;
    private string $apiVersion;

    /**
     * Options to configure VerifyToken::verifyToken.
     *
     * @param  string|null  $secretKey  The Clerk secret key from the API Keys page in the Clerk Dashboard. (Optional)
     * @param  string|null  $jwtKey  PEM Public String used to verify the session token in a networkless manner. (Optional)
     * @param  array|null  $audiences  A list of audiences to verify against.
     * @param  array|null  $authorizedParties  An allowlist of origins to verify against.
     * @param  int|null  $clockSkewInMs  Allowed time difference (in milliseconds) between the Clerk server (which generates the token) and the clock of the user's application server when validating a token. Defaults to 5000 ms.
     * @param  string|null  $apiUrl  The Clerk Backend API endpoint. Defaults to 'https://api.clerk.com'
     * @param  string|null  $apiVersion  The version passed to the Clerk API. Defaults to 'v1'

     * @throws TokenVerificationException
     */
    public function __construct(
        ?string $secretKey = null,
        ?string $jwtKey = null,
        ?array $audiences = null,
        ?array $authorizedParties = null,
        ?int $clockSkewInMs = null,
        ?string $apiUrl = null,
        ?string $apiVersion = null
    ) {
        if (empty($secretKey) && empty($jwtKey)) {
            throw new TokenVerificationException(TokenVerificationErrorReason::$SECRET_KEY_MISSING);
        }

        $this->secretKey = $secretKey;
        $this->jwtKey = $jwtKey;
        $this->audiences = $audiences;
        $this->authorizedParties = $authorizedParties;
        $this->clockSkewInMs = $clockSkewInMs ?? self::DEFAULT_CLOCK_SKEW_MS;
        $this->apiUrl = $apiUrl ?? self::DEFAULT_API_URL;
        $this->apiVersion = $apiVersion ?? self::DEFAULT_API_VERSION;
    }

    public function getSecretKey(): ?string
    {
        return $this->secretKey;
    }

    public function getJwtKey(): ?string
    {
        return $this->jwtKey;
    }

    public function getAudiences(): ?array
    {
        return $this->audiences;
    }

    public function getAuthorizedParties(): ?array
    {
        return $this->authorizedParties;
    }

    public function getClockSkewInMs(): int
    {
        return $this->clockSkewInMs;
    }

    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }
}

<?php

namespace Clerk\Backend\Helpers\Jwks;

class AuthenticateRequestOptions
{
    private const DEFAULT_CLOCK_SKEW_MS = 5000;

    private ?string $secretKey;
    private ?string $machineSecretKey;
    private ?string $jwtKey;
    /** @var array<string> */
    private ?array $audiences;
    /** @var array<string> */
    private array $authorizedParties;
    private int $clockSkewInMs;
    /** @var array<string> */
    private array $acceptsToken;
    private bool $skipJwksCache;
    /**
     * Options to configure AuthenticateRequest::authenticateRequest.
     *
     * @param  ?string  $secretKey  The Clerk secret key from the API Keys page in the Clerk Dashboard.
     * @param  ?string  $machineSecretKey  The Machine secret key for verifying M2M tokens.
     * @param  ?string  $jwtKey  PEM Public String used to verify the session token in a networkless manner.
     * @param  ?array<string>  $audiences  A list of audiences to verify against.
     * @param  ?array<string>  $authorizedParties  An allowlist of origins to verify against.
     * @param  ?int  $clockSkewInMs  Allowed time difference (in milliseconds) between the Clerk server (which generates the token) and the clock of the user's application server when validating a token. Defaults to 5000 ms.
     * @param  ?array<string>  $acceptsToken  A list of token types to accept. Defaults to ["any"].
     * @param  ?bool  $skipJwksCache  Whether to skip the JWKS cache. Defaults to false.
     * @throws AuthenticateRequestException
     */
    public function __construct(
        ?string $secretKey = null,
        ?string $machineSecretKey = null,
        ?string $jwtKey = null,
        ?array $audiences = null,
        ?array $authorizedParties = null,
        ?int $clockSkewInMs = null,
        ?array $acceptsToken = null,
        ?bool $skipJwksCache = false
    ) {
        if (empty($secretKey) && empty($machineSecretKey) && empty($jwtKey)) {
            throw new AuthenticateRequestException(AuthErrorReason::$SECRET_KEY_MISSING);
        }

        $this->secretKey = $secretKey;
        $this->machineSecretKey = $machineSecretKey;
        $this->jwtKey = $jwtKey;
        $this->audiences = $audiences;
        $this->authorizedParties = $authorizedParties ?? [];
        $this->clockSkewInMs = $clockSkewInMs ?? self::DEFAULT_CLOCK_SKEW_MS;
        $this->acceptsToken = $acceptsToken ?? ['any'];
        $this->skipJwksCache = $skipJwksCache;
    }

    public function getSecretKey(): ?string
    {
        return $this->secretKey;
    }

    public function getMachineSecretKey(): ?string
    {
        return $this->machineSecretKey;
    }

    public function getJwtKey(): ?string
    {
        return $this->jwtKey;
    }

    /**
     * @return ?array<string>
     */
    public function getAudiences(): ?array
    {
        return $this->audiences;
    }

    /**
     * @return array<string>
     */
    public function getAuthorizedParties(): array
    {
        return $this->authorizedParties;
    }

    public function getClockSkewInMs(): int
    {
        return $this->clockSkewInMs;
    }

    /**
     * @return array<string>
     */
    public function getAcceptsToken(): array
    {
        return $this->acceptsToken;
    }
}

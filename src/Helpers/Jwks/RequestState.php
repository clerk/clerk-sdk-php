<?php

namespace Clerk\Backend\Helpers\Jwks;

use Clerk\Backend\Helpers\Jwks\AuthObject;
use Clerk\Backend\Helpers\Jwks\SessionAuthObjectV1;
use Clerk\Backend\Helpers\Jwks\SessionAuthObjectV2;
use Clerk\Backend\Helpers\Jwks\OAuthMachineAuthObject;
use Clerk\Backend\Helpers\Jwks\APIKeyMachineAuthObject;
use Clerk\Backend\Helpers\Jwks\M2MMachineAuthObject;
use stdClass;

/**
 * Authentication State of the request.
 */
class RequestState
{
    private ?stdClass $payload;
    private ?ErrorReason $errorReason;
    private AuthStatus $status;
    private ?string $token;

    public function __construct(AuthStatus $status, ?ErrorReason $errorReason, ?string $token, ?stdClass $payload)
    {
        $this->status = $status;
        $this->errorReason = $errorReason;
        $this->token = $token;
        $this->payload = $payload;
    }

    public static function signedIn(string $token, stdClass $payload): RequestState
    {
        return new RequestState(AuthStatus::signedIn(), null, $token, $payload);
    }

    public static function signedOut(ErrorReason $errorReason): RequestState
    {
        return new RequestState(AuthStatus::signedOut(), $errorReason, null, null);
    }

    /**
     * Check if the request is authenticated.
     * This is the preferred method over isSignedIn().
     *
     * @return bool True if the request is authenticated
     */
    public function isAuthenticated(): bool
    {
        return $this->status === AuthStatus::signedIn();
    }

    /**
     * Check if the request is signed in.
     * @deprecated Use isAuthenticated() instead
     *
     * @return bool True if the request is signed in
     */
    public function isSignedIn(): bool
    {
        return $this->status === AuthStatus::signedIn();
    }

    public function isSignedOut(): bool
    {
        return $this->status === AuthStatus::signedOut();
    }

    /**
     * Convert the request state to an auth object.
     * This method returns an AuthObject with authentication information
     * that matches the structure expected by the Python/JS SDKs.
     *
     * @return AuthObject The auth object
     * @throws \RuntimeException if not authenticated or unsupported token type
     */
    public function toAuth(): AuthObject
    {
        if (! $this->isAuthenticated()) {
            throw new \RuntimeException('Cannot convert to AuthObject in unauthenticated state.');
        }
        $payload = (array) $this->payload;
        $tokenType = TokenTypes::getTokenType($this->token);
        switch ($tokenType) {
            case TokenTypes::SESSION_TOKEN:
                if (isset($payload['v']) && $payload['v'] === 2) {
                    return new SessionAuthObjectV2($payload);
                }

                return new SessionAuthObjectV1($payload);
            case TokenTypes::OAUTH_TOKEN:
                return new OAuthMachineAuthObject($payload);
            case TokenTypes::API_KEY:
                return new APIKeyMachineAuthObject($payload);
            case TokenTypes::MACHINE_TOKEN:
                return new M2MMachineAuthObject($payload);
            default:
                throw new \RuntimeException('Unsupported token type: '.$tokenType);
        }
    }

    public function getPayload(): ?stdClass
    {
        return $this->payload;
    }

    public function getErrorReason(): ?ErrorReason
    {
        return $this->errorReason;
    }

    public function getStatus(): AuthStatus
    {
        return $this->status;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }
}

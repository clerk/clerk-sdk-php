<?php

namespace Clerk\Backend\Helpers\Jwks;

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

    public function isSignedIn(): bool
    {
        return $this->status === AuthStatus::signedIn();
    }

    public function isSignedOut(): bool
    {
        return $this->status === AuthStatus::signedOut();
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

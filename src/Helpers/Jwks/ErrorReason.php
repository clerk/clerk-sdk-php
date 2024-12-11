<?php

namespace Clerk\Backend\Helpers\Jwks;

/**
 * The reason for a TokenVerificationException or AuthenticateRequestException.
 */
class ErrorReason
{
    private string $id;
    private string $message;

    public function __construct(string $id, string $message)
    {
        $this->id = $id;
        $this->message = $message;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}

<?php

namespace Clerk\Backend\Helpers\Jwks;

/**
 * The reason for a TokenVerificationException or AuthenticateRequestException.
 */
class ErrorReason
    /**
     * Returns the error code (alias for getId()).
     */
    
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
    public function getCode(): string
    {
        return $this->id;
    }
}

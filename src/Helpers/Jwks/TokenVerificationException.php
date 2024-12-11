<?php

namespace Clerk\Backend\Helpers\Jwks;

use Exception;

/**
 * Exception thrown when an error occurs during the token verification process.
 */
class TokenVerificationException extends Exception
{
    private ErrorReason $reason;

    public function __construct(ErrorReason $reason, ?Exception $previous = null)
    {
        parent::__construct($reason->getMessage(), 0, $previous);
        $this->reason = $reason;
    }

    public function getReason(): ErrorReason
    {
        return $this->reason;
    }

    public function __toString(): string
    {
        return $this->reason->getMessage();
    }
}

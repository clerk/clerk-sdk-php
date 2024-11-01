<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Errors;

class ClerkErrors40Throwable extends \RuntimeException
{
    public ClerkErrors40 $container;

    public function __construct(string $message, int $statusCode, ClerkErrors40 $container)
    {
        parent::__construct($message, $statusCode);
        $this->container = $container;
    }
}
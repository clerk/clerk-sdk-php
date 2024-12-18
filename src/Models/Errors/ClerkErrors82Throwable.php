<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Errors;

class ClerkErrors82Throwable extends \RuntimeException
{
    public ClerkErrors82 $container;

    public function __construct(string $message, int $statusCode, ClerkErrors82 $container)
    {
        parent::__construct($message, $statusCode);
        $this->container = $container;
    }
}
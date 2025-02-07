<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class VerifyTOTPRequestBody
{
    /**
     * The TOTP or backup code to verify
     *
     * @var string $code
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('code')]
    public string $code;

    /**
     * @param  string  $code
     * @phpstan-pure
     */
    public function __construct(string $code)
    {
        $this->code = $code;
    }
}
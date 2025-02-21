<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


class VerificationOTP
{
    /**
     *
     * @var OTPVerificationStatus $status
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('status')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\OTPVerificationStatus')]
    public OTPVerificationStatus $status;

    /**
     *
     * @var OTPVerificationStrategy $strategy
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('strategy')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\OTPVerificationStrategy')]
    public OTPVerificationStrategy $strategy;

    /**
     *
     * @var ?int $attempts
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('attempts')]
    public ?int $attempts;

    /**
     *
     * @var ?int $expireAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('expire_at')]
    public ?int $expireAt;

    /**
     *
     * @var ?string $verifiedAtClient
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('verified_at_client')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $verifiedAtClient = null;

    /**
     * @param  OTPVerificationStatus  $status
     * @param  OTPVerificationStrategy  $strategy
     * @param  ?int  $attempts
     * @param  ?int  $expireAt
     * @param  ?string  $verifiedAtClient
     * @phpstan-pure
     */
    public function __construct(OTPVerificationStatus $status, OTPVerificationStrategy $strategy, ?int $attempts = null, ?int $expireAt = null, ?string $verifiedAtClient = null)
    {
        $this->status = $status;
        $this->strategy = $strategy;
        $this->attempts = $attempts;
        $this->expireAt = $expireAt;
        $this->verifiedAtClient = $verifiedAtClient;
    }
}
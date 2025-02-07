<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


class VerificationAdmin
{
    /**
     *
     * @var AdminVerificationPhoneNumberStatus $status
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('status')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\AdminVerificationPhoneNumberStatus')]
    public AdminVerificationPhoneNumberStatus $status;

    /**
     *
     * @var AdminVerificationStrategy $strategy
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('strategy')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\AdminVerificationStrategy')]
    public AdminVerificationStrategy $strategy;

    /**
     *
     * @var ?int $attempts
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('attempts')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $attempts = null;

    /**
     *
     * @var ?int $expireAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('expire_at')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $expireAt = null;

    /**
     * @param  AdminVerificationPhoneNumberStatus  $status
     * @param  AdminVerificationStrategy  $strategy
     * @param  ?int  $attempts
     * @param  ?int  $expireAt
     * @phpstan-pure
     */
    public function __construct(AdminVerificationPhoneNumberStatus $status, AdminVerificationStrategy $strategy, ?int $attempts = null, ?int $expireAt = null)
    {
        $this->status = $status;
        $this->strategy = $strategy;
        $this->attempts = $attempts;
        $this->expireAt = $expireAt;
    }
}
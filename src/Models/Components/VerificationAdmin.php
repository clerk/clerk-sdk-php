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
    #[\JMS\Serializer\Annotation\SerializedName('status')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\AdminVerificationPhoneNumberStatus')]
    public AdminVerificationPhoneNumberStatus $status;

    /**
     *
     * @var AdminVerificationStrategy $strategy
     */
    #[\JMS\Serializer\Annotation\SerializedName('strategy')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\AdminVerificationStrategy')]
    public AdminVerificationStrategy $strategy;

    /**
     *
     * @var ?int $attempts
     */
    #[\JMS\Serializer\Annotation\SerializedName('attempts')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?int $attempts = null;

    /**
     *
     * @var ?int $expireAt
     */
    #[\JMS\Serializer\Annotation\SerializedName('expire_at')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?int $expireAt = null;

    /**
     * @param  ?AdminVerificationPhoneNumberStatus  $status
     * @param  ?AdminVerificationStrategy  $strategy
     * @param  ?int  $attempts
     * @param  ?int  $expireAt
     */
    public function __construct(?AdminVerificationPhoneNumberStatus $status = null, ?AdminVerificationStrategy $strategy = null, ?int $attempts = null, ?int $expireAt = null)
    {
        $this->status = $status;
        $this->strategy = $strategy;
        $this->attempts = $attempts;
        $this->expireAt = $expireAt;
    }
}
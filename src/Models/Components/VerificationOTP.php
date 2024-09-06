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
    #[\JMS\Serializer\Annotation\SerializedName('status')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\OTPVerificationStatus')]
    public OTPVerificationStatus $status;

    /**
     *
     * @var OTPVerificationStrategy $strategy
     */
    #[\JMS\Serializer\Annotation\SerializedName('strategy')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\OTPVerificationStrategy')]
    public OTPVerificationStrategy $strategy;

    /**
     *
     * @var int $attempts
     */
    #[\JMS\Serializer\Annotation\SerializedName('attempts')]
    public int $attempts;

    /**
     *
     * @var int $expireAt
     */
    #[\JMS\Serializer\Annotation\SerializedName('expire_at')]
    public int $expireAt;

    /**
     * @param  ?OTPVerificationStatus  $status
     * @param  ?OTPVerificationStrategy  $strategy
     * @param  ?int  $attempts
     * @param  ?int  $expireAt
     */
    public function __construct(?OTPVerificationStatus $status = null, ?OTPVerificationStrategy $strategy = null, ?int $attempts = null, ?int $expireAt = null)
    {
        $this->status = $status;
        $this->strategy = $strategy;
        $this->attempts = $attempts;
        $this->expireAt = $expireAt;
    }
}
<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


class Web3Signature
{
    /**
     *
     * @var Web3SignatureVerificationStatus $status
     */
    #[\JMS\Serializer\Annotation\SerializedName('status')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\Web3SignatureVerificationStatus')]
    public Web3SignatureVerificationStatus $status;

    /**
     *
     * @var Web3SignatureVerificationStrategy $strategy
     */
    #[\JMS\Serializer\Annotation\SerializedName('strategy')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\Web3SignatureVerificationStrategy')]
    public Web3SignatureVerificationStrategy $strategy;

    /**
     *
     * @var Nonce $nonce
     */
    #[\JMS\Serializer\Annotation\SerializedName('nonce')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\Nonce')]
    public Nonce $nonce;

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
     * @param  ?Web3SignatureVerificationStatus  $status
     * @param  ?Web3SignatureVerificationStrategy  $strategy
     * @param  ?Nonce  $nonce
     * @param  ?int  $attempts
     * @param  ?int  $expireAt
     */
    public function __construct(?Web3SignatureVerificationStatus $status = null, ?Web3SignatureVerificationStrategy $strategy = null, ?Nonce $nonce = null, ?int $attempts = null, ?int $expireAt = null)
    {
        $this->status = $status;
        $this->strategy = $strategy;
        $this->nonce = $nonce;
        $this->attempts = $attempts;
        $this->expireAt = $expireAt;
    }
}
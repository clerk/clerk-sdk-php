<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


/** OrganizationDomainVerification - Verification details for the domain */
class OrganizationDomainVerification
{
    /**
     * Status of the verification. It can be `unverified` or `verified`
     *
     * @var ?OrganizationDomainStatus $status
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('status')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\OrganizationDomainStatus|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?OrganizationDomainStatus $status = null;

    /**
     * Name of the strategy used to verify the domain
     *
     * @var ?string $strategy
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('strategy')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $strategy = null;

    /**
     * How many attempts have been made to verify the domain
     *
     * @var ?int $attempts
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('attempts')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $attempts = null;

    /**
     * Unix timestamp of when the verification will expire
     *
     * @var ?int $expireAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('expire_at')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $expireAt = null;

    /**
     * @param  ?OrganizationDomainStatus  $status
     * @param  ?string  $strategy
     * @param  ?int  $attempts
     * @param  ?int  $expireAt
     * @phpstan-pure
     */
    public function __construct(?OrganizationDomainStatus $status = null, ?string $strategy = null, ?int $attempts = null, ?int $expireAt = null)
    {
        $this->status = $status;
        $this->strategy = $strategy;
        $this->attempts = $attempts;
        $this->expireAt = $expireAt;
    }
}
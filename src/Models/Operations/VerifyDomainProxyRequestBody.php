<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class VerifyDomainProxyRequestBody
{
    /**
     * The ID of the domain that will be updated.
     *
     * @var ?string $domainId
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('domain_id')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $domainId = null;

    /**
     * The full URL of the proxy which will forward requests to the Clerk Frontend API for this domain. e.g. https://example.com/__clerk
     *
     * @var ?string $proxyUrl
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('proxy_url')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $proxyUrl = null;

    /**
     * @param  ?string  $domainId
     * @param  ?string  $proxyUrl
     * @phpstan-pure
     */
    public function __construct(?string $domainId = null, ?string $proxyUrl = null)
    {
        $this->domainId = $domainId;
        $this->proxyUrl = $proxyUrl;
    }
}
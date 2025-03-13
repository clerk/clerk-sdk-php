<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


/** ProxyCheck - Health check information about a domain's proxy configuration validation attempt. */
class ProxyCheck
{
    /**
     *
     * @var ProxyCheckObject $object
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('object')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\ProxyCheckObject')]
    public ProxyCheckObject $object;

    /**
     *
     * @var string $id
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('id')]
    public string $id;

    /**
     *
     * @var string $domainId
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('domain_id')]
    public string $domainId;

    /**
     *
     * @var string $proxyUrl
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('proxy_url')]
    public string $proxyUrl;

    /**
     *
     * @var bool $successful
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('successful')]
    public bool $successful;

    /**
     * Unix timestamp of creation.
     *
     *
     *
     * @var int $createdAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('created_at')]
    public int $createdAt;

    /**
     * Unix timestamp of last update.
     *
     *
     *
     * @var int $updatedAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('updated_at')]
    public int $updatedAt;

    /**
     * Unix timestamp of last run.
     *
     *
     *
     * @var ?int $lastRunAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('last_run_at')]
    public ?int $lastRunAt;

    /**
     * @param  ProxyCheckObject  $object
     * @param  string  $id
     * @param  string  $domainId
     * @param  string  $proxyUrl
     * @param  bool  $successful
     * @param  int  $createdAt
     * @param  int  $updatedAt
     * @param  ?int  $lastRunAt
     * @phpstan-pure
     */
    public function __construct(ProxyCheckObject $object, string $id, string $domainId, string $proxyUrl, bool $successful, int $createdAt, int $updatedAt, ?int $lastRunAt = null)
    {
        $this->object = $object;
        $this->id = $id;
        $this->domainId = $domainId;
        $this->proxyUrl = $proxyUrl;
        $this->successful = $successful;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->lastRunAt = $lastRunAt;
    }
}
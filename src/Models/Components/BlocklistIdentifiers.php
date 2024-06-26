<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


class BlocklistIdentifiers
{
    /**
     * $data
     *
     * @var array<\Clerk\Backend\Models\Components\BlocklistIdentifier> $data
     */
    #[\JMS\Serializer\Annotation\SerializedName('data')]
    #[\JMS\Serializer\Annotation\Type('array<Clerk\Backend\Models\Components\BlocklistIdentifier>')]
    public array $data;

    /**
     * Total number of blocklist identifiers
     *
     *
     *
     * @var int $totalCount
     */
    #[\JMS\Serializer\Annotation\SerializedName('total_count')]
    #[\JMS\Serializer\Annotation\Type('int')]
    public int $totalCount;

    public function __construct()
    {
        $this->data = [];
        $this->totalCount = 0;
    }
}
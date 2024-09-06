<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


class OAuthApplications
{
    /**
     * $data
     *
     * @var array<OAuthApplication> $data
     */
    #[\JMS\Serializer\Annotation\SerializedName('data')]
    #[\JMS\Serializer\Annotation\Type('array<\Clerk\Backend\Models\Components\OAuthApplication>')]
    public array $data;

    /**
     * Total number of OAuth applications
     *
     *
     *
     * @var int $totalCount
     */
    #[\JMS\Serializer\Annotation\SerializedName('total_count')]
    public int $totalCount;

    /**
     * @param  ?array<OAuthApplication>  $data
     * @param  ?int  $totalCount
     */
    public function __construct(?array $data = null, ?int $totalCount = null)
    {
        $this->data = $data;
        $this->totalCount = $totalCount;
    }
}
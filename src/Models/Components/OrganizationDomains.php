<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


/** OrganizationDomains - A list of organization domains */
class OrganizationDomains
{
    /**
     * $data
     *
     * @var array<OrganizationDomain> $data
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('data')]
    #[\Speakeasy\Serializer\Annotation\Type('array<\Clerk\Backend\Models\Components\OrganizationDomain>')]
    public array $data;

    /**
     * Total number of organization domains
     *
     *
     *
     * @var int $totalCount
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('total_count')]
    public int $totalCount;

    /**
     * @param  array<OrganizationDomain>  $data
     * @param  int  $totalCount
     * @phpstan-pure
     */
    public function __construct(array $data, int $totalCount)
    {
        $this->data = $data;
        $this->totalCount = $totalCount;
    }
}
<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class ListOrganizationsRequest
{
    /**
     * Applies a limit to the number of results returned.
     *
     * Can be used for paginating the results together with `offset`.
     *
     * @var ?float $limit
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=limit')]
    public ?float $limit = null;

    /**
     * Skip the first `offset` results when paginating.
     *
     * Needs to be an integer greater or equal to zero.
     * To be used in conjunction with `limit`.
     *
     * @var ?float $offset
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=offset')]
    public ?float $offset = null;

    /**
     * Flag to denote whether the member counts of each organization should be included in the response or not.
     *
     * @var ?bool $includeMembersCount
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=include_members_count')]
    public ?bool $includeMembersCount = null;

    /**
     * Returns organizations with ID, name, or slug that match the given query.
     *
     * Uses exact match for organization ID and partial match for name and slug.
     *
     * @var ?string $query
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=query')]
    public ?string $query = null;

    /**
     * Allows to return organizations in a particular order.
     *
     * At the moment, you can order the returned organizations either by their `name`, `created_at` or `members_count`.
     * In order to specify the direction, you can use the `+/-` symbols prepended in the property to order by.
     * For example, if you want organizations to be returned in descending order according to their `created_at` property, you can use `-created_at`.
     * If you don't use `+` or `-`, then `+` is implied.
     * Defaults to `-created_at`.
     *
     * @var ?string $orderBy
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=order_by')]
    public ?string $orderBy = null;

    /**
     * @param  ?float  $limit
     * @param  ?float  $offset
     * @param  ?bool  $includeMembersCount
     * @param  ?string  $query
     * @param  ?string  $orderBy
     */
    public function __construct(?float $limit = null, ?float $offset = null, ?bool $includeMembersCount = null, ?string $query = null, ?string $orderBy = null)
    {
        $this->limit = $limit;
        $this->offset = $offset;
        $this->includeMembersCount = $includeMembersCount;
        $this->query = $query;
        $this->orderBy = $orderBy;
    }
}
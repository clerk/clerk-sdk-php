<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class GetClientListRequest
{
    /**
     * Whether to paginate the results.
     *
     * If true, the results will be paginated.
     * If false, the results will not be paginated.
     *
     * @var ?bool $paginated
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=paginated')]
    public ?bool $paginated = null;

    /**
     * Applies a limit to the number of results returned.
     *
     * Can be used for paginating the results together with `offset`.
     *
     * @var ?int $limit
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=limit')]
    public ?int $limit = null;

    /**
     * Skip the first `offset` results when paginating.
     *
     * Needs to be an integer greater or equal to zero.
     * To be used in conjunction with `limit`.
     *
     * @var ?int $offset
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=offset')]
    public ?int $offset = null;

    /**
     * @param  ?bool  $paginated
     * @param  ?int  $limit
     * @param  ?int  $offset
     * @phpstan-pure
     */
    public function __construct(?bool $paginated = null, ?int $limit = 10, ?int $offset = 0)
    {
        $this->paginated = $paginated;
        $this->limit = $limit;
        $this->offset = $offset;
    }
}
<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class GetSessionListRequest
{
    /**
     * List sessions for the given client
     *
     * @var ?string $clientId
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=client_id')]
    public ?string $clientId = null;

    /**
     * List sessions for the given user
     *
     * @var ?string $userId
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=user_id')]
    public ?string $userId = null;

    /**
     * Filter sessions by the provided status
     *
     * @var ?Status $status
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=status')]
    public ?Status $status = null;

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
     * @param  ?string  $clientId
     * @param  ?string  $userId
     * @param  ?Status  $status
     * @param  ?float  $limit
     * @param  ?float  $offset
     */
    public function __construct(?string $clientId = null, ?string $userId = null, ?Status $status = null, ?float $limit = null, ?float $offset = null)
    {
        $this->clientId = $clientId;
        $this->userId = $userId;
        $this->status = $status;
        $this->limit = $limit;
        $this->offset = $offset;
    }
}
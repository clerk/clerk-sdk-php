<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class UnbanUserRequest
{
    /**
     * The ID of the user to unban
     *
     * @var string $userId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=user_id')]
    public string $userId;

    /**
     * @param  string  $userId
     * @phpstan-pure
     */
    public function __construct(string $userId)
    {
        $this->userId = $userId;
    }
}
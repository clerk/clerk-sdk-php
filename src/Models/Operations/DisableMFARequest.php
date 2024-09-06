<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class DisableMFARequest
{
    /**
     * The ID of the user whose MFA methods are to be disabled
     *
     * @var string $userId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=user_id')]
    public string $userId;

    /**
     * @param  ?string  $userId
     */
    public function __construct(?string $userId = null)
    {
        $this->userId = $userId;
    }
}
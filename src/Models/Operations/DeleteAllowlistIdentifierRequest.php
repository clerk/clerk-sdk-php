<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class DeleteAllowlistIdentifierRequest
{
    /**
     * The ID of the identifier to delete from the allow-list
     *
     * @var string $identifierId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=identifier_id')]
    public string $identifierId;

    /**
     * @param  ?string  $identifierId
     */
    public function __construct(?string $identifierId = null)
    {
        $this->identifierId = $identifierId;
    }
}
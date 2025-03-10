<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class GetClientRequest
{
    /**
     * Client ID.
     *
     * @var string $clientId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=client_id')]
    public string $clientId;

    /**
     * @param  string  $clientId
     * @phpstan-pure
     */
    public function __construct(string $clientId)
    {
        $this->clientId = $clientId;
    }
}
<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class UpdateSAMLConnectionRequest
{
    /**
     * The ID of the SAML Connection to update
     *
     * @var string $samlConnectionId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=saml_connection_id')]
    public string $samlConnectionId;

    /**
     *
     * @var UpdateSAMLConnectionRequestBody $requestBody
     */
    #[SpeakeasyMetadata('request:mediaType=application/json')]
    public UpdateSAMLConnectionRequestBody $requestBody;

    /**
     * @param  string  $samlConnectionId
     * @param  UpdateSAMLConnectionRequestBody  $requestBody
     * @phpstan-pure
     */
    public function __construct(string $samlConnectionId, UpdateSAMLConnectionRequestBody $requestBody)
    {
        $this->samlConnectionId = $samlConnectionId;
        $this->requestBody = $requestBody;
    }
}
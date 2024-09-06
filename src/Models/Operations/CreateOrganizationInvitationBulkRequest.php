<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class CreateOrganizationInvitationBulkRequest
{
    /**
     * The organization ID.
     *
     * @var string $organizationId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=organization_id')]
    public string $organizationId;

    /**
     * $requestBody
     *
     * @var array<RequestBody> $requestBody
     */
    #[SpeakeasyMetadata('request:mediaType=application/json')]
    public array $requestBody;

    /**
     * @param  ?string  $organizationId
     * @param  ?array<RequestBody>  $requestBody
     */
    public function __construct(?string $organizationId = null, ?array $requestBody = null)
    {
        $this->organizationId = $organizationId;
        $this->requestBody = $requestBody;
    }
}
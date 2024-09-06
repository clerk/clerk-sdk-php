<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class UpdateOrganizationMembershipRequest
{
    /**
     * The ID of the organization the membership belongs to
     *
     * @var string $organizationId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=organization_id')]
    public string $organizationId;

    /**
     * The ID of the user that this membership belongs to
     *
     * @var string $userId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=user_id')]
    public string $userId;

    /**
     *
     * @var UpdateOrganizationMembershipRequestBody $requestBody
     */
    #[SpeakeasyMetadata('request:mediaType=application/json')]
    public UpdateOrganizationMembershipRequestBody $requestBody;

    /**
     * @param  ?string  $organizationId
     * @param  ?string  $userId
     * @param  ?UpdateOrganizationMembershipRequestBody  $requestBody
     */
    public function __construct(?string $organizationId = null, ?string $userId = null, ?UpdateOrganizationMembershipRequestBody $requestBody = null)
    {
        $this->organizationId = $organizationId;
        $this->userId = $userId;
        $this->requestBody = $requestBody;
    }
}
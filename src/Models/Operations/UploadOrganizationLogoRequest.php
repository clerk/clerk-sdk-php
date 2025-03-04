<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class UploadOrganizationLogoRequest
{
    /**
     * The ID of the organization for which to upload a logo
     *
     * @var string $organizationId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=organization_id')]
    public string $organizationId;

    /**
     *
     * @var ?UploadOrganizationLogoRequestBody $requestBody
     */
    #[SpeakeasyMetadata('request:mediaType=multipart/form-data')]
    public ?UploadOrganizationLogoRequestBody $requestBody = null;

    /**
     * @param  string  $organizationId
     * @param  ?UploadOrganizationLogoRequestBody  $requestBody
     * @phpstan-pure
     */
    public function __construct(string $organizationId, ?UploadOrganizationLogoRequestBody $requestBody = null)
    {
        $this->organizationId = $organizationId;
        $this->requestBody = $requestBody;
    }
}
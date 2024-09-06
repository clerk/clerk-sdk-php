<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class DeleteOrganizationLogoRequest
{
    /**
     * The ID of the organization for which the logo will be deleted.
     *
     * @var string $organizationId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=organization_id')]
    public string $organizationId;

    /**
     * @param  ?string  $organizationId
     */
    public function __construct(?string $organizationId = null)
    {
        $this->organizationId = $organizationId;
    }
}
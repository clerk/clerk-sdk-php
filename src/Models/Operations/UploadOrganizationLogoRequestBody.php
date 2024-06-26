<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class UploadOrganizationLogoRequestBody
{
    /**
     * The ID of the user that will be credited with the image upload.
     *
     * @var string $uploaderUserId
     */
    #[SpeakeasyMetadata('multipartForm:name=uploader_user_id')]
    public string $uploaderUserId;

    #[SpeakeasyMetadata('multipartForm:file=true')]
    public UploadOrganizationLogoFile $file;

    public function __construct()
    {
        $this->uploaderUserId = '';
        $this->file = new \Clerk\Backend\Models\Operations\UploadOrganizationLogoFile();
    }
}
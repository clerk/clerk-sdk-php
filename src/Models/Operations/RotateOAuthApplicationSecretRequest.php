<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class RotateOAuthApplicationSecretRequest
{
    /**
     * The ID of the OAuth application for which to rotate the client secret
     *
     * @var string $oauthApplicationId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=oauth_application_id')]
    public string $oauthApplicationId;

    public function __construct()
    {
        $this->oauthApplicationId = '';
    }
}
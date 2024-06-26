<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class CreateSessionTokenFromTemplateRequest
{
    /**
     * The ID of the session
     *
     * @var string $sessionId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=session_id')]
    public string $sessionId;

    /**
     * The name of the JWT Template defined in your instance (e.g. `custom_hasura`).
     *
     * @var string $templateName
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=template_name')]
    public string $templateName;

    public function __construct()
    {
        $this->sessionId = '';
        $this->templateName = '';
    }
}
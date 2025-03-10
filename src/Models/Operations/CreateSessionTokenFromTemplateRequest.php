<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
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

    /**
     *
     * @var ?CreateSessionTokenFromTemplateRequestBody $requestBody
     */
    #[SpeakeasyMetadata('request:mediaType=application/json')]
    public ?CreateSessionTokenFromTemplateRequestBody $requestBody = null;

    /**
     * @param  string  $sessionId
     * @param  string  $templateName
     * @param  ?CreateSessionTokenFromTemplateRequestBody  $requestBody
     * @phpstan-pure
     */
    public function __construct(string $sessionId, string $templateName, ?CreateSessionTokenFromTemplateRequestBody $requestBody = null)
    {
        $this->sessionId = $sessionId;
        $this->templateName = $templateName;
        $this->requestBody = $requestBody;
    }
}
<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class VerifySessionRequest
{
    /**
     * The ID of the session
     *
     * @var string $sessionId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=session_id')]
    public string $sessionId;

    /**
     * Parameters.
     *
     * @var ?VerifySessionRequestBody $requestBody
     */
    #[SpeakeasyMetadata('request:mediaType=application/json')]
    public ?VerifySessionRequestBody $requestBody = null;

    /**
     * @param  string  $sessionId
     * @param  ?VerifySessionRequestBody  $requestBody
     * @phpstan-pure
     */
    public function __construct(string $sessionId, ?VerifySessionRequestBody $requestBody = null)
    {
        $this->sessionId = $sessionId;
        $this->requestBody = $requestBody;
    }
}
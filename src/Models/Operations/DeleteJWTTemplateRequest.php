<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class DeleteJWTTemplateRequest
{
    /**
     * JWT Template ID
     *
     * @var string $templateId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=template_id')]
    public string $templateId;

    /**
     * @param  string  $templateId
     * @phpstan-pure
     */
    public function __construct(string $templateId)
    {
        $this->templateId = $templateId;
    }
}
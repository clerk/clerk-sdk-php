<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class GetTemplateRequest
{
    /**
     * The type of templates to retrieve (email or SMS)
     *
     * @var PathParamTemplateType $templateType
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=template_type')]
    public PathParamTemplateType $templateType;

    /**
     * The slug (i.e. machine-friendly name) of the template to retrieve
     *
     * @var string $slug
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=slug')]
    public string $slug;

    /**
     * @param  PathParamTemplateType  $templateType
     * @param  string  $slug
     * @phpstan-pure
     */
    public function __construct(PathParamTemplateType $templateType, string $slug)
    {
        $this->templateType = $templateType;
        $this->slug = $slug;
    }
}
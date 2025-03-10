<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class ToggleTemplateDeliveryRequest
{
    /**
     * The type of template to toggle delivery for
     *
     * @var ToggleTemplateDeliveryPathParamTemplateType $templateType
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=template_type')]
    public ToggleTemplateDeliveryPathParamTemplateType $templateType;

    /**
     * The slug of the template for which to toggle delivery
     *
     * @var string $slug
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=slug')]
    public string $slug;

    /**
     *
     * @var ?ToggleTemplateDeliveryRequestBody $requestBody
     */
    #[SpeakeasyMetadata('request:mediaType=application/json')]
    public ?ToggleTemplateDeliveryRequestBody $requestBody = null;

    /**
     * @param  ToggleTemplateDeliveryPathParamTemplateType  $templateType
     * @param  string  $slug
     * @param  ?ToggleTemplateDeliveryRequestBody  $requestBody
     * @phpstan-pure
     */
    public function __construct(ToggleTemplateDeliveryPathParamTemplateType $templateType, string $slug, ?ToggleTemplateDeliveryRequestBody $requestBody = null)
    {
        $this->templateType = $templateType;
        $this->slug = $slug;
        $this->requestBody = $requestBody;
    }
}
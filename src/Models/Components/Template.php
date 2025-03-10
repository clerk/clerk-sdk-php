<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


/** Template - Success */
class Template
{
    /**
     *
     * @var ?string $id
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('id')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $id = null;

    /**
     * String representing the object's type. Objects of the same type share the same value.
     *
     *
     *
     * @var ?TemplateObject $object
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('object')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\TemplateObject|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?TemplateObject $object = null;

    /**
     * whether this is a system (default) or user overridden) template
     *
     * @var ?string $resourceType
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('resource_type')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $resourceType = null;

    /**
     * whether this is an email or SMS template
     *
     * @var ?string $templateType
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('template_type')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $templateType = null;

    /**
     * user-friendly name of the template
     *
     * @var ?string $name
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('name')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $name = null;

    /**
     * machine-friendly name of the template
     *
     * @var ?string $slug
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('slug')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $slug = null;

    /**
     * position with the listing of templates
     *
     * @var ?int $position
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('position')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $position = null;

    /**
     * whether this template can be reverted to the corresponding system default
     *
     * @var ?bool $canRevert
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('can_revert')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $canRevert = null;

    /**
     * whether this template can be deleted
     *
     * @var ?bool $canDelete
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('can_delete')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $canDelete = null;

    /**
     * whether this template can be enabled or disabled, true only for notification SMS templates
     *
     * @var ?bool $canToggle
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('can_toggle')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $canToggle = null;

    /**
     * the editor markup used to generate the body of the template
     *
     * @var ?string $markup
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('markup')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $markup = null;

    /**
     * the template body before variable interpolation
     *
     * @var ?string $body
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('body')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $body = null;

    /**
     * list of variables that are available for use in the template body
     *
     * @var ?array<string> $availableVariables
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('available_variables')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $availableVariables = null;

    /**
     * list of variables that must be contained in the template body
     *
     * @var ?array<string> $requiredVariables
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('required_variables')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $requiredVariables = null;

    /**
     *
     * @var ?string $fromEmailName
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('from_email_name')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $fromEmailName = null;

    /**
     *
     * @var ?string $replyToEmailName
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('reply_to_email_name')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $replyToEmailName = null;

    /**
     *
     * @var ?bool $deliveredByClerk
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('delivered_by_clerk')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $deliveredByClerk = null;

    /**
     *
     * @var ?bool $enabled
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('enabled')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $enabled = null;

    /**
     * Unix timestamp of last update.
     *
     *
     *
     * @var ?int $updatedAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('updated_at')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $updatedAt = null;

    /**
     * Unix timestamp of creation.
     *
     *
     *
     * @var ?int $createdAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('created_at')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $createdAt = null;

    /**
     * the id of the instance the template belongs to
     *
     * @var ?string $instanceId
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('instance_id')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $instanceId = null;

    /**
     * email subject
     *
     * @var ?string $subject
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('subject')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $subject = null;

    /**
     * @param  ?string  $id
     * @param  ?TemplateObject  $object
     * @param  ?string  $resourceType
     * @param  ?string  $templateType
     * @param  ?string  $name
     * @param  ?string  $slug
     * @param  ?int  $position
     * @param  ?bool  $canRevert
     * @param  ?bool  $canDelete
     * @param  ?bool  $canToggle
     * @param  ?string  $markup
     * @param  ?string  $body
     * @param  ?array<string>  $availableVariables
     * @param  ?array<string>  $requiredVariables
     * @param  ?string  $fromEmailName
     * @param  ?string  $replyToEmailName
     * @param  ?bool  $deliveredByClerk
     * @param  ?bool  $enabled
     * @param  ?int  $updatedAt
     * @param  ?int  $createdAt
     * @param  ?string  $instanceId
     * @param  ?string  $subject
     * @phpstan-pure
     */
    public function __construct(?string $id = null, ?TemplateObject $object = null, ?string $resourceType = null, ?string $templateType = null, ?string $name = null, ?string $slug = null, ?int $position = null, ?bool $canRevert = null, ?bool $canDelete = null, ?bool $canToggle = null, ?string $markup = null, ?string $body = null, ?array $availableVariables = null, ?array $requiredVariables = null, ?string $fromEmailName = null, ?string $replyToEmailName = null, ?bool $deliveredByClerk = null, ?bool $enabled = null, ?int $updatedAt = null, ?int $createdAt = null, ?string $instanceId = null, ?string $subject = null)
    {
        $this->id = $id;
        $this->object = $object;
        $this->resourceType = $resourceType;
        $this->templateType = $templateType;
        $this->name = $name;
        $this->slug = $slug;
        $this->position = $position;
        $this->canRevert = $canRevert;
        $this->canDelete = $canDelete;
        $this->canToggle = $canToggle;
        $this->markup = $markup;
        $this->body = $body;
        $this->availableVariables = $availableVariables;
        $this->requiredVariables = $requiredVariables;
        $this->fromEmailName = $fromEmailName;
        $this->replyToEmailName = $replyToEmailName;
        $this->deliveredByClerk = $deliveredByClerk;
        $this->enabled = $enabled;
        $this->updatedAt = $updatedAt;
        $this->createdAt = $createdAt;
        $this->instanceId = $instanceId;
        $this->subject = $subject;
    }
}
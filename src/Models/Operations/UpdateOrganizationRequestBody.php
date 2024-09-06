<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class UpdateOrganizationRequestBody
{
    /**
     * Metadata saved on the organization, that is visible to both your frontend and backend.
     *
     * @var ?UpdateOrganizationPublicMetadata $publicMetadata
     */
    #[\JMS\Serializer\Annotation\SerializedName('public_metadata')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Operations\UpdateOrganizationPublicMetadata|null')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?UpdateOrganizationPublicMetadata $publicMetadata = null;

    /**
     * Metadata saved on the organization that is only visible to your backend.
     *
     * @var ?UpdateOrganizationPrivateMetadata $privateMetadata
     */
    #[\JMS\Serializer\Annotation\SerializedName('private_metadata')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Operations\UpdateOrganizationPrivateMetadata|null')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?UpdateOrganizationPrivateMetadata $privateMetadata = null;

    /**
     * The new name of the organization
     *
     * @var ?string $name
     */
    #[\JMS\Serializer\Annotation\SerializedName('name')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $name = null;

    /**
     * The new slug of the organization, which needs to be unique in the instance
     *
     * @var ?string $slug
     */
    #[\JMS\Serializer\Annotation\SerializedName('slug')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $slug = null;

    /**
     * The maximum number of memberships allowed for this organization
     *
     * @var ?int $maxAllowedMemberships
     */
    #[\JMS\Serializer\Annotation\SerializedName('max_allowed_memberships')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?int $maxAllowedMemberships = null;

    /**
     * If true, an admin can delete this organization with the Frontend API.
     *
     * @var ?bool $adminDeleteEnabled
     */
    #[\JMS\Serializer\Annotation\SerializedName('admin_delete_enabled')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $adminDeleteEnabled = null;

    /**
     * @param  ?UpdateOrganizationPublicMetadata  $publicMetadata
     * @param  ?UpdateOrganizationPrivateMetadata  $privateMetadata
     * @param  ?string  $name
     * @param  ?string  $slug
     * @param  ?int  $maxAllowedMemberships
     * @param  ?bool  $adminDeleteEnabled
     */
    public function __construct(?UpdateOrganizationPublicMetadata $publicMetadata = null, ?UpdateOrganizationPrivateMetadata $privateMetadata = null, ?string $name = null, ?string $slug = null, ?int $maxAllowedMemberships = null, ?bool $adminDeleteEnabled = null)
    {
        $this->publicMetadata = $publicMetadata;
        $this->privateMetadata = $privateMetadata;
        $this->name = $name;
        $this->slug = $slug;
        $this->maxAllowedMemberships = $maxAllowedMemberships;
        $this->adminDeleteEnabled = $adminDeleteEnabled;
    }
}
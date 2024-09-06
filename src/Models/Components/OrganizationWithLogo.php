<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


class OrganizationWithLogo
{
    /**
     *
     * @var OrganizationWithLogoObject $object
     */
    #[\JMS\Serializer\Annotation\SerializedName('object')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\OrganizationWithLogoObject')]
    public OrganizationWithLogoObject $object;

    /**
     *
     * @var string $id
     */
    #[\JMS\Serializer\Annotation\SerializedName('id')]
    public string $id;

    /**
     *
     * @var string $name
     */
    #[\JMS\Serializer\Annotation\SerializedName('name')]
    public string $name;

    /**
     *
     * @var string $slug
     */
    #[\JMS\Serializer\Annotation\SerializedName('slug')]
    public string $slug;

    /**
     *
     * @var ?int $membersCount
     */
    #[\JMS\Serializer\Annotation\SerializedName('members_count')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?int $membersCount = null;

    /**
     *
     * @var int $maxAllowedMemberships
     */
    #[\JMS\Serializer\Annotation\SerializedName('max_allowed_memberships')]
    public int $maxAllowedMemberships;

    /**
     *
     * @var ?bool $adminDeleteEnabled
     */
    #[\JMS\Serializer\Annotation\SerializedName('admin_delete_enabled')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $adminDeleteEnabled = null;

    /**
     *
     * @var OrganizationWithLogoPublicMetadata $publicMetadata
     */
    #[\JMS\Serializer\Annotation\SerializedName('public_metadata')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\OrganizationWithLogoPublicMetadata')]
    public OrganizationWithLogoPublicMetadata $publicMetadata;

    /**
     *
     * @var OrganizationWithLogoPrivateMetadata $privateMetadata
     */
    #[\JMS\Serializer\Annotation\SerializedName('private_metadata')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\OrganizationWithLogoPrivateMetadata')]
    public OrganizationWithLogoPrivateMetadata $privateMetadata;

    /**
     *
     * @var ?string $createdBy
     */
    #[\JMS\Serializer\Annotation\SerializedName('created_by')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $createdBy = null;

    /**
     * Unix timestamp of creation.
     *
     *
     *
     * @var int $createdAt
     */
    #[\JMS\Serializer\Annotation\SerializedName('created_at')]
    public int $createdAt;

    /**
     * Unix timestamp of last update.
     *
     *
     *
     * @var int $updatedAt
     */
    #[\JMS\Serializer\Annotation\SerializedName('updated_at')]
    public int $updatedAt;

    /**
     *
     * @var ?string $logoUrl
     * @deprecated  field: This will be removed in a future release, please migrate away from it as soon as possible.
     */
    #[\JMS\Serializer\Annotation\SerializedName('logo_url')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $logoUrl = null;

    /**
     *
     * @var string $imageUrl
     */
    #[\JMS\Serializer\Annotation\SerializedName('image_url')]
    public string $imageUrl;

    /**
     *
     * @var ?bool $hasImage
     */
    #[\JMS\Serializer\Annotation\SerializedName('has_image')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $hasImage = null;

    /**
     * @param  ?OrganizationWithLogoObject  $object
     * @param  ?string  $id
     * @param  ?string  $name
     * @param  ?string  $slug
     * @param  ?int  $maxAllowedMemberships
     * @param  ?OrganizationWithLogoPublicMetadata  $publicMetadata
     * @param  ?OrganizationWithLogoPrivateMetadata  $privateMetadata
     * @param  ?int  $createdAt
     * @param  ?int  $updatedAt
     * @param  ?string  $imageUrl
     * @param  ?int  $membersCount
     * @param  ?bool  $adminDeleteEnabled
     * @param  ?string  $createdBy
     * @param  ?string  $logoUrl
     * @param  ?bool  $hasImage
     */
    public function __construct(?OrganizationWithLogoObject $object = null, ?string $id = null, ?string $name = null, ?string $slug = null, ?int $maxAllowedMemberships = null, ?OrganizationWithLogoPublicMetadata $publicMetadata = null, ?OrganizationWithLogoPrivateMetadata $privateMetadata = null, ?int $createdAt = null, ?int $updatedAt = null, ?string $imageUrl = null, ?int $membersCount = null, ?bool $adminDeleteEnabled = null, ?string $createdBy = null, ?string $logoUrl = null, ?bool $hasImage = null)
    {
        $this->object = $object;
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->maxAllowedMemberships = $maxAllowedMemberships;
        $this->publicMetadata = $publicMetadata;
        $this->privateMetadata = $privateMetadata;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->imageUrl = $imageUrl;
        $this->membersCount = $membersCount;
        $this->adminDeleteEnabled = $adminDeleteEnabled;
        $this->createdBy = $createdBy;
        $this->logoUrl = $logoUrl;
        $this->hasImage = $hasImage;
    }
}
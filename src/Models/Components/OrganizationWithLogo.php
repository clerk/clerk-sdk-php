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
    #[\Speakeasy\Serializer\Annotation\SerializedName('object')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\OrganizationWithLogoObject')]
    public OrganizationWithLogoObject $object;

    /**
     *
     * @var string $id
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('id')]
    public string $id;

    /**
     *
     * @var string $name
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('name')]
    public string $name;

    /**
     *
     * @var string $slug
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('slug')]
    public string $slug;

    /**
     *
     * @var int $maxAllowedMemberships
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('max_allowed_memberships')]
    public int $maxAllowedMemberships;

    /**
     *
     * @var bool $adminDeleteEnabled
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('admin_delete_enabled')]
    public bool $adminDeleteEnabled;

    /**
     * $publicMetadata
     *
     * @var array<string, mixed> $publicMetadata
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('public_metadata')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string, mixed>')]
    public array $publicMetadata;

    /**
     * $privateMetadata
     *
     * @var array<string, mixed> $privateMetadata
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('private_metadata')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string, mixed>')]
    public array $privateMetadata;

    /**
     * Unix timestamp of creation.
     *
     *
     *
     * @var int $createdAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('created_at')]
    public int $createdAt;

    /**
     * Unix timestamp of last update.
     *
     *
     *
     * @var int $updatedAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('updated_at')]
    public int $updatedAt;

    /**
     *
     * @var string $imageUrl
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('image_url')]
    public string $imageUrl;

    /**
     *
     * @var bool $hasImage
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('has_image')]
    public bool $hasImage;

    /**
     *
     * @var ?int $membersCount
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('members_count')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $membersCount = null;

    /**
     *
     * @var ?bool $missingMemberWithElevatedPermissions
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('missing_member_with_elevated_permissions')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $missingMemberWithElevatedPermissions = null;

    /**
     *
     * @var ?int $pendingInvitationsCount
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('pending_invitations_count')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $pendingInvitationsCount = null;

    /**
     *
     * @var ?string $createdBy
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('created_by')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $createdBy = null;

    /**
     *
     * @var ?string $logoUrl
     * @deprecated  field: This will be removed in a future release, please migrate away from it as soon as possible.
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('logo_url')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $logoUrl = null;

    /**
     * @param  OrganizationWithLogoObject  $object
     * @param  string  $id
     * @param  string  $name
     * @param  string  $slug
     * @param  int  $maxAllowedMemberships
     * @param  bool  $adminDeleteEnabled
     * @param  array<string, mixed>  $publicMetadata
     * @param  array<string, mixed>  $privateMetadata
     * @param  int  $createdAt
     * @param  int  $updatedAt
     * @param  string  $imageUrl
     * @param  bool  $hasImage
     * @param  ?int  $membersCount
     * @param  ?bool  $missingMemberWithElevatedPermissions
     * @param  ?int  $pendingInvitationsCount
     * @param  ?string  $createdBy
     * @param  ?string  $logoUrl
     * @phpstan-pure
     */
    public function __construct(OrganizationWithLogoObject $object, string $id, string $name, string $slug, int $maxAllowedMemberships, bool $adminDeleteEnabled, array $publicMetadata, array $privateMetadata, int $createdAt, int $updatedAt, string $imageUrl, bool $hasImage, ?int $membersCount = null, ?bool $missingMemberWithElevatedPermissions = null, ?int $pendingInvitationsCount = null, ?string $createdBy = null, ?string $logoUrl = null)
    {
        $this->object = $object;
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->maxAllowedMemberships = $maxAllowedMemberships;
        $this->adminDeleteEnabled = $adminDeleteEnabled;
        $this->publicMetadata = $publicMetadata;
        $this->privateMetadata = $privateMetadata;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->imageUrl = $imageUrl;
        $this->hasImage = $hasImage;
        $this->membersCount = $membersCount;
        $this->missingMemberWithElevatedPermissions = $missingMemberWithElevatedPermissions;
        $this->pendingInvitationsCount = $pendingInvitationsCount;
        $this->createdBy = $createdBy;
        $this->logoUrl = $logoUrl;
    }
}
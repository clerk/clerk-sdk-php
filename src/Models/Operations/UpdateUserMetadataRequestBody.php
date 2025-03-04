<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class UpdateUserMetadataRequestBody
{
    /**
     * Metadata saved on the user, that is visible to both your frontend and backend.
     *
     * The new object will be merged with the existing value.
     *
     * @var ?array<string, mixed> $publicMetadata
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('public_metadata')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string, mixed>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $publicMetadata = null;

    /**
     * Metadata saved on the user that is only visible to your backend.
     *
     * The new object will be merged with the existing value.
     *
     * @var ?array<string, mixed> $privateMetadata
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('private_metadata')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string, mixed>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $privateMetadata = null;

    /**
     * Metadata saved on the user, that can be updated from both the Frontend and Backend APIs.
     *
     * The new object will be merged with the existing value.
     *
     * Note: Since this data can be modified from the frontend, it is not guaranteed to be safe.
     *
     * @var ?array<string, mixed> $unsafeMetadata
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('unsafe_metadata')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string, mixed>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $unsafeMetadata = null;

    /**
     * @param  ?array<string, mixed>  $publicMetadata
     * @param  ?array<string, mixed>  $privateMetadata
     * @param  ?array<string, mixed>  $unsafeMetadata
     * @phpstan-pure
     */
    public function __construct(?array $publicMetadata = null, ?array $privateMetadata = null, ?array $unsafeMetadata = null)
    {
        $this->publicMetadata = $publicMetadata;
        $this->privateMetadata = $privateMetadata;
        $this->unsafeMetadata = $unsafeMetadata;
    }
}
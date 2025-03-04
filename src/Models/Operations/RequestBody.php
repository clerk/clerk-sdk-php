<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class RequestBody
{
    /**
     * The email address the invitation will be sent to
     *
     * @var string $emailAddress
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('email_address')]
    public string $emailAddress;

    /**
     * Metadata that will be attached to the newly created invitation.
     *
     * The value of this property should be a well-formed JSON object.
     * Once the user accepts the invitation and signs up, these metadata will end up in the user's public metadata.
     *
     * @var ?array<string, mixed> $publicMetadata
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('public_metadata')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string, mixed>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $publicMetadata = null;

    /**
     * The URL where the user is redirected upon visiting the invitation link, where they can accept the invitation. Required if you have implemented a [custom flow for handling application invitations](/docs/custom-flows/invitations).
     *
     * @var ?string $redirectUrl
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('redirect_url')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $redirectUrl = null;

    /**
     * The number of days the invitation will be valid for. By default, the invitation expires after 30 days.
     *
     * @var ?int $expiresInDays
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('expires_in_days')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $expiresInDays = null;

    /**
     * Optional flag which denotes whether an email invitation should be sent to the given email address.
     *
     * Defaults to true.
     *
     * @var ?bool $notify
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('notify')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $notify = null;

    /**
     * Whether an invitation should be created if there is already an existing invitation for this email
     *
     * address, or it's claimed by another user.
     *
     * @var ?bool $ignoreExisting
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('ignore_existing')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $ignoreExisting = null;

    /**
     * @param  string  $emailAddress
     * @param  ?array<string, mixed>  $publicMetadata
     * @param  ?string  $redirectUrl
     * @param  ?bool  $notify
     * @param  ?bool  $ignoreExisting
     * @param  ?int  $expiresInDays
     * @phpstan-pure
     */
    public function __construct(string $emailAddress, ?array $publicMetadata = null, ?string $redirectUrl = null, ?int $expiresInDays = null, ?bool $notify = true, ?bool $ignoreExisting = false)
    {
        $this->emailAddress = $emailAddress;
        $this->publicMetadata = $publicMetadata;
        $this->redirectUrl = $redirectUrl;
        $this->expiresInDays = $expiresInDays;
        $this->notify = $notify;
        $this->ignoreExisting = $ignoreExisting;
    }
}
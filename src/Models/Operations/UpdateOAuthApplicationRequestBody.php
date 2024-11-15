<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class UpdateOAuthApplicationRequestBody
{
    /**
     * The new name of the OAuth application
     *
     * @var ?string $name
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('name')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $name = null;

    /**
     * The new callback URL of the OAuth application
     *
     * @var ?string $callbackUrl
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('callback_url')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $callbackUrl = null;

    /**
     * Define the allowed scopes for the new OAuth applications that dictate the user payload of the OAuth user info endpoint. Available scopes are `profile`, `email`, `public_metadata`, `private_metadata`. Provide the requested scopes as a string, separated by spaces.
     *
     * @var ?string $scopes
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('scopes')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $scopes = null;

    /**
     * @param  ?string  $name
     * @param  ?string  $callbackUrl
     * @param  ?string  $scopes
     */
    public function __construct(?string $name = null, ?string $callbackUrl = null, ?string $scopes = 'profile email')
    {
        $this->name = $name;
        $this->callbackUrl = $callbackUrl;
        $this->scopes = $scopes;
    }
}
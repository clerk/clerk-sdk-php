<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class CreateOAuthApplicationRequestBody
{
    /**
     * The name of the new OAuth application
     *
     * @var string $name
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('name')]
    public string $name;

    /**
     * An array of redirect URIs of the new OAuth application
     *
     * @var ?array<string> $redirectUris
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('redirect_uris')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $redirectUris = null;

    /**
     * The callback URL of the new OAuth application
     *
     * @var ?string $callbackUrl
     * @deprecated  field: This will be removed in a future release, please migrate away from it as soon as possible.
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('callback_url')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $callbackUrl = null;

    /**
     * If true, this client is public and you can use the Proof Key of Code Exchange (PKCE) flow.
     *
     * @var ?bool $public
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('public')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $public = null;

    /**
     * Define the allowed scopes for the new OAuth applications that dictate the user payload of the OAuth user info endpoint. Available scopes are `profile`, `email`, `public_metadata`, `private_metadata`. Provide the requested scopes as a string, separated by spaces.
     *
     * @var ?string $scopes
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('scopes')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $scopes = null;

    /**
     * @param  string  $name
     * @param  ?array<string>  $redirectUris
     * @param  ?string  $callbackUrl
     * @param  ?string  $scopes
     * @param  ?bool  $public
     * @phpstan-pure
     */
    public function __construct(string $name, ?array $redirectUris = null, ?string $callbackUrl = null, ?bool $public = null, ?string $scopes = 'profile email')
    {
        $this->name = $name;
        $this->redirectUris = $redirectUris;
        $this->callbackUrl = $callbackUrl;
        $this->public = $public;
        $this->scopes = $scopes;
    }
}
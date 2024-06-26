<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
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
    #[\JMS\Serializer\Annotation\SerializedName('name')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $name;

    /**
     * The callback URL of the new OAuth application
     *
     * @var string $callbackUrl
     */
    #[\JMS\Serializer\Annotation\SerializedName('callback_url')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $callbackUrl;

    /**
     * Define the allowed scopes for the new OAuth applications that dictate the user payload of the OAuth user info endpoint. Available scopes are `profile`, `email`, `public_metadata`, `private_metadata`. Provide the requested scopes as a string, separated by spaces.
     *
     * @var ?string $scopes
     */
    #[\JMS\Serializer\Annotation\SerializedName('scopes')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $scopes = null;

    /**
     * If true, this client is public and cannot securely store a client secret.
     *
     * Only the authorization code flow with proof key for code exchange (PKCE) may be used.
     * Public clients cannot be updated to be confidential clients, and vice versa.
     *
     * @var ?bool $public
     */
    #[\JMS\Serializer\Annotation\SerializedName('public')]
    #[\JMS\Serializer\Annotation\Type('bool')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $public = null;

    public function __construct()
    {
        $this->name = '';
        $this->callbackUrl = '';
        $this->scopes = null;
        $this->public = null;
    }
}
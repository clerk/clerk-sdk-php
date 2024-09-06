<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


class SAMLAccount
{
    /**
     *
     * @var string $id
     */
    #[\JMS\Serializer\Annotation\SerializedName('id')]
    public string $id;

    /**
     * String representing the object's type. Objects of the same type share the same value.
     *
     *
     *
     * @var SAMLAccountObject $object
     */
    #[\JMS\Serializer\Annotation\SerializedName('object')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\SAMLAccountObject')]
    public SAMLAccountObject $object;

    /**
     *
     * @var string $provider
     */
    #[\JMS\Serializer\Annotation\SerializedName('provider')]
    public string $provider;

    /**
     *
     * @var bool $active
     */
    #[\JMS\Serializer\Annotation\SerializedName('active')]
    public bool $active;

    /**
     *
     * @var string $emailAddress
     */
    #[\JMS\Serializer\Annotation\SerializedName('email_address')]
    public string $emailAddress;

    /**
     *
     * @var ?string $firstName
     */
    #[\JMS\Serializer\Annotation\SerializedName('first_name')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $firstName = null;

    /**
     *
     * @var ?string $lastName
     */
    #[\JMS\Serializer\Annotation\SerializedName('last_name')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $lastName = null;

    /**
     *
     * @var ?string $providerUserId
     */
    #[\JMS\Serializer\Annotation\SerializedName('provider_user_id')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $providerUserId = null;

    /**
     *
     * @var ?SAMLAccountPublicMetadata $publicMetadata
     */
    #[\JMS\Serializer\Annotation\SerializedName('public_metadata')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\SAMLAccountPublicMetadata|null')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?SAMLAccountPublicMetadata $publicMetadata = null;

    /**
     *
     * @var Saml|Ticket $verification
     */
    #[\JMS\Serializer\Annotation\SerializedName('verification')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\Saml|\Clerk\Backend\Models\Components\Ticket')]
    public Saml|Ticket $verification;

    /**
     * @param  ?string  $id
     * @param  ?SAMLAccountObject  $object
     * @param  ?string  $provider
     * @param  ?bool  $active
     * @param  ?string  $emailAddress
     * @param  Saml|Ticket|null  $verification
     * @param  ?string  $firstName
     * @param  ?string  $lastName
     * @param  ?string  $providerUserId
     * @param  ?SAMLAccountPublicMetadata  $publicMetadata
     */
    public function __construct(?string $id = null, ?SAMLAccountObject $object = null, ?string $provider = null, ?bool $active = null, ?string $emailAddress = null, Saml|Ticket|null $verification = null, ?string $firstName = null, ?string $lastName = null, ?string $providerUserId = null, ?SAMLAccountPublicMetadata $publicMetadata = null)
    {
        $this->id = $id;
        $this->object = $object;
        $this->provider = $provider;
        $this->active = $active;
        $this->emailAddress = $emailAddress;
        $this->verification = $verification;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->providerUserId = $providerUserId;
        $this->publicMetadata = $publicMetadata;
    }
}
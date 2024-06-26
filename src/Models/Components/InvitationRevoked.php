<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


class InvitationRevoked
{
    #[\JMS\Serializer\Annotation\SerializedName('object')]
    #[\JMS\Serializer\Annotation\Type('enum<Clerk\Backend\Models\Components\InvitationRevokedObject>')]
    public InvitationRevokedObject $object;

    #[\JMS\Serializer\Annotation\SerializedName('id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $id;

    #[\JMS\Serializer\Annotation\SerializedName('email_address')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $emailAddress;

    #[\JMS\Serializer\Annotation\SerializedName('public_metadata')]
    #[\JMS\Serializer\Annotation\Type('Clerk\Backend\Models\Components\InvitationRevokedPublicMetadata')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?InvitationRevokedPublicMetadata $publicMetadata = null;

    #[\JMS\Serializer\Annotation\SerializedName('revoked')]
    #[\JMS\Serializer\Annotation\Type('bool')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $revoked = null;

    #[\JMS\Serializer\Annotation\SerializedName('status')]
    #[\JMS\Serializer\Annotation\Type('enum<Clerk\Backend\Models\Components\InvitationRevokedStatus>')]
    public InvitationRevokedStatus $status;

    #[\JMS\Serializer\Annotation\SerializedName('url')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $url = null;

    /**
     * Unix timestamp of creation.
     *
     *
     *
     * @var int $createdAt
     */
    #[\JMS\Serializer\Annotation\SerializedName('created_at')]
    #[\JMS\Serializer\Annotation\Type('int')]
    public int $createdAt;

    /**
     * Unix timestamp of last update.
     *
     *
     *
     * @var int $updatedAt
     */
    #[\JMS\Serializer\Annotation\SerializedName('updated_at')]
    #[\JMS\Serializer\Annotation\Type('int')]
    public int $updatedAt;

    public function __construct()
    {
        $this->object = \Clerk\Backend\Models\Components\InvitationRevokedObject::Invitation;
        $this->id = '';
        $this->emailAddress = '';
        $this->publicMetadata = null;
        $this->revoked = null;
        $this->status = \Clerk\Backend\Models\Components\InvitationRevokedStatus::Revoked;
        $this->url = null;
        $this->createdAt = 0;
        $this->updatedAt = 0;
    }
}
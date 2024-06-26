<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


class Session
{
    /**
     * String representing the object's type. Objects of the same type share the same value.
     *
     *
     *
     * @var \Clerk\Backend\Models\Components\SessionObject $object
     */
    #[\JMS\Serializer\Annotation\SerializedName('object')]
    #[\JMS\Serializer\Annotation\Type('enum<Clerk\Backend\Models\Components\SessionObject>')]
    public SessionObject $object;

    #[\JMS\Serializer\Annotation\SerializedName('id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $id;

    #[\JMS\Serializer\Annotation\SerializedName('user_id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $userId;

    #[\JMS\Serializer\Annotation\SerializedName('client_id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $clientId;

    #[\JMS\Serializer\Annotation\SerializedName('actor')]
    #[\JMS\Serializer\Annotation\Type('Clerk\Backend\Models\Components\Actor')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?Actor $actor = null;

    #[\JMS\Serializer\Annotation\SerializedName('status')]
    #[\JMS\Serializer\Annotation\Type('enum<Clerk\Backend\Models\Components\Status>')]
    public Status $status;

    #[\JMS\Serializer\Annotation\SerializedName('last_active_organization_id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $lastActiveOrganizationId = null;

    #[\JMS\Serializer\Annotation\SerializedName('last_active_at')]
    #[\JMS\Serializer\Annotation\Type('int')]
    public int $lastActiveAt;

    #[\JMS\Serializer\Annotation\SerializedName('expire_at')]
    #[\JMS\Serializer\Annotation\Type('int')]
    public int $expireAt;

    #[\JMS\Serializer\Annotation\SerializedName('abandon_at')]
    #[\JMS\Serializer\Annotation\Type('int')]
    public int $abandonAt;

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

    public function __construct()
    {
        $this->object = \Clerk\Backend\Models\Components\SessionObject::Session;
        $this->id = '';
        $this->userId = '';
        $this->clientId = '';
        $this->actor = null;
        $this->status = \Clerk\Backend\Models\Components\Status::Active;
        $this->lastActiveOrganizationId = null;
        $this->lastActiveAt = 0;
        $this->expireAt = 0;
        $this->abandonAt = 0;
        $this->updatedAt = 0;
        $this->createdAt = 0;
    }
}
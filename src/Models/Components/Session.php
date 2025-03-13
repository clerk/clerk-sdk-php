<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
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
     * @var SessionObject $object
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('object')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\SessionObject')]
    public SessionObject $object;

    /**
     *
     * @var string $id
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('id')]
    public string $id;

    /**
     *
     * @var string $userId
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('user_id')]
    public string $userId;

    /**
     *
     * @var string $clientId
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('client_id')]
    public string $clientId;

    /**
     *
     * @var Status $status
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('status')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\Status')]
    public Status $status;

    /**
     *
     * @var int $lastActiveAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('last_active_at')]
    public int $lastActiveAt;

    /**
     * Unix timestamp of expiration.
     *
     *
     *
     * @var int $expireAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('expire_at')]
    public int $expireAt;

    /**
     * Unix timestamp of abandonment.
     *
     *
     *
     * @var int $abandonAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('abandon_at')]
    public int $abandonAt;

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
     * Unix timestamp of creation.
     *
     *
     *
     * @var int $createdAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('created_at')]
    public int $createdAt;

    /**
     *
     * @var ?Actor $actor
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('actor')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\Actor|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?Actor $actor = null;

    /**
     *
     * @var ?string $lastActiveOrganizationId
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('last_active_organization_id')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $lastActiveOrganizationId = null;

    /**
     *
     * @var ?SessionActivityResponse $latestActivity
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('latest_activity')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\SessionActivityResponse|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?SessionActivityResponse $latestActivity = null;

    /**
     * @param  SessionObject  $object
     * @param  string  $id
     * @param  string  $userId
     * @param  string  $clientId
     * @param  Status  $status
     * @param  int  $lastActiveAt
     * @param  int  $expireAt
     * @param  int  $abandonAt
     * @param  int  $updatedAt
     * @param  int  $createdAt
     * @param  ?Actor  $actor
     * @param  ?string  $lastActiveOrganizationId
     * @param  ?SessionActivityResponse  $latestActivity
     * @phpstan-pure
     */
    public function __construct(SessionObject $object, string $id, string $userId, string $clientId, Status $status, int $lastActiveAt, int $expireAt, int $abandonAt, int $updatedAt, int $createdAt, ?Actor $actor = null, ?string $lastActiveOrganizationId = null, ?SessionActivityResponse $latestActivity = null)
    {
        $this->object = $object;
        $this->id = $id;
        $this->userId = $userId;
        $this->clientId = $clientId;
        $this->status = $status;
        $this->lastActiveAt = $lastActiveAt;
        $this->expireAt = $expireAt;
        $this->abandonAt = $abandonAt;
        $this->updatedAt = $updatedAt;
        $this->createdAt = $createdAt;
        $this->actor = $actor;
        $this->lastActiveOrganizationId = $lastActiveOrganizationId;
        $this->latestActivity = $latestActivity;
    }
}
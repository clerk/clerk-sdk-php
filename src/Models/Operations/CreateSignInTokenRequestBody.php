<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class CreateSignInTokenRequestBody
{
    /**
     * The ID of the user that can use the newly created sign in token
     *
     * @var string $userId
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('user_id')]
    public string $userId;

    /**
     * Optional parameter to specify the life duration of the sign in token in seconds.
     *
     * By default, the duration is 30 days.
     *
     * @var ?int $expiresInSeconds
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('expires_in_seconds')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $expiresInSeconds = null;

    /**
     * @param  string  $userId
     * @param  ?int  $expiresInSeconds
     * @phpstan-pure
     */
    public function __construct(string $userId, ?int $expiresInSeconds = 2592000)
    {
        $this->userId = $userId;
        $this->expiresInSeconds = $expiresInSeconds;
    }
}
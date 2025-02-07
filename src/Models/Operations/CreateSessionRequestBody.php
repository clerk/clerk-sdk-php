<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class CreateSessionRequestBody
{
    /**
     * The ID representing the user
     *
     * @var ?string $userId
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('user_id')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $userId = null;

    /**
     * @param  ?string  $userId
     * @phpstan-pure
     */
    public function __construct(?string $userId = null)
    {
        $this->userId = $userId;
    }
}
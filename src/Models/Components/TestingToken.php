<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


class TestingToken
{
    #[\JMS\Serializer\Annotation\SerializedName('object')]
    #[\JMS\Serializer\Annotation\Type('enum<Clerk\Backend\Models\Components\TestingTokenObject>')]
    public TestingTokenObject $object;

    /**
     * The actual token. This value is meant to be passed in the `__clerk_testing_token` query parameter with requests to the Frontend API.
     *
     * @var string $token
     */
    #[\JMS\Serializer\Annotation\SerializedName('token')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $token;

    /**
     * Unix timestamp of the token's expiration time.
     *
     *
     *
     * @var int $expiresAt
     */
    #[\JMS\Serializer\Annotation\SerializedName('expires_at')]
    #[\JMS\Serializer\Annotation\Type('int')]
    public int $expiresAt;

    public function __construct()
    {
        $this->object = \Clerk\Backend\Models\Components\TestingTokenObject::TestingToken;
        $this->token = '';
        $this->expiresAt = 0;
    }
}
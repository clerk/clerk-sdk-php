<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


class SchemasPasskey
{
    /**
     * String representing the object's type. Objects of the same type share the same value.
     *
     *
     *
     * @var SchemasPasskeyObject $object
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('object')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\SchemasPasskeyObject')]
    public SchemasPasskeyObject $object;

    /**
     *
     * @var string $name
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('name')]
    public string $name;

    /**
     * Unix timestamp of when the passkey was last used.
     *
     *
     *
     * @var int $lastUsedAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('last_used_at')]
    public int $lastUsedAt;

    /**
     *
     * @var ?string $id
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('id')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $id = null;

    /**
     *
     * @var ?Passkey $verification
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('verification')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\Passkey|null')]
    public ?Passkey $verification;

    /**
     * @param  SchemasPasskeyObject  $object
     * @param  string  $name
     * @param  int  $lastUsedAt
     * @param  ?string  $id
     * @param  ?Passkey  $verification
     * @phpstan-pure
     */
    public function __construct(SchemasPasskeyObject $object, string $name, int $lastUsedAt, ?string $id = null, ?Passkey $verification = null)
    {
        $this->object = $object;
        $this->name = $name;
        $this->lastUsedAt = $lastUsedAt;
        $this->id = $id;
        $this->verification = $verification;
    }
}
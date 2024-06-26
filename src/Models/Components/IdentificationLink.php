<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


class IdentificationLink
{
    #[\JMS\Serializer\Annotation\SerializedName('type')]
    #[\JMS\Serializer\Annotation\Type('enum<Clerk\Backend\Models\Components\Type>')]
    public Type $type;

    #[\JMS\Serializer\Annotation\SerializedName('id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $id;

    public function __construct()
    {
        $this->type = \Clerk\Backend\Models\Components\Type::OauthGoogle;
        $this->id = '';
    }
}
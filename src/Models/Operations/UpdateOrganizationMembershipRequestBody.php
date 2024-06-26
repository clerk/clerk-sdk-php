<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class UpdateOrganizationMembershipRequestBody
{
    /**
     * The new role of the given membership.
     *
     * @var string $role
     */
    #[\JMS\Serializer\Annotation\SerializedName('role')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $role;

    public function __construct()
    {
        $this->role = '';
    }
}
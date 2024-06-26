<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class RevokeOrganizationInvitationRequestBody
{
    /**
     * The ID of the user that revokes the invitation.
     *
     * Must be an administrator in the organization.
     *
     * @var string $requestingUserId
     */
    #[\JMS\Serializer\Annotation\SerializedName('requesting_user_id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $requestingUserId;

    public function __construct()
    {
        $this->requestingUserId = '';
    }
}
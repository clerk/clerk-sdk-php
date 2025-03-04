<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class GetOAuthAccessTokenRequest
{
    /**
     * The ID of the user for which to retrieve the OAuth access token
     *
     * @var string $userId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=user_id')]
    public string $userId;

    /**
     * The ID of the OAuth provider (e.g. `oauth_google`)
     *
     * @var string $provider
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=provider')]
    public string $provider;

    /**
     * @param  string  $userId
     * @param  string  $provider
     * @phpstan-pure
     */
    public function __construct(string $userId, string $provider)
    {
        $this->userId = $userId;
        $this->provider = $provider;
    }
}
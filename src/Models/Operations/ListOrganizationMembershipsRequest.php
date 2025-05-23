<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;

use Clerk\Backend\Utils\SpeakeasyMetadata;
class ListOrganizationMembershipsRequest
{
    /**
     * The organization ID.
     *
     * @var string $organizationId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=organization_id')]
    public string $organizationId;

    /**
     * Sorts organizations memberships by phone_number, email_address, created_at, first_name, last_name or username.
     *
     * By prepending one of those values with + or -, we can choose to sort in ascending (ASC) or descending (DESC) order."
     *
     * @var ?string $orderBy
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=order_by')]
    public ?string $orderBy = null;

    /**
     * Returns users with the user ids specified. For each user id, the `+` and `-` can be
     *
     * prepended to the id, which denote whether the respective user id should be included or
     * excluded from the result set. Accepts up to 100 user ids. Any user ids not found are ignored.
     *
     * @var ?array<string> $userId
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=user_id')]
    public ?array $userId = null;

    /**
     * Returns users with the specified email addresses. Accepts up to 100 email addresses. Any email addresses not found are ignored.
     *
     * @var ?array<string> $emailAddress
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=email_address')]
    public ?array $emailAddress = null;

    /**
     * Returns users with the specified phone numbers. Accepts up to 100 phone numbers. Any phone numbers not found are ignored.
     *
     * @var ?array<string> $phoneNumber
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=phone_number')]
    public ?array $phoneNumber = null;

    /**
     * Returns users with the specified usernames.
     *
     * Accepts up to 100 usernames.
     * Any usernames not found are ignored.
     *
     * @var ?array<string> $username
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=username')]
    public ?array $username = null;

    /**
     * Returns users with the specified web3 wallet addresses.
     *
     * Accepts up to 100 web3 wallet addresses.
     * Any web3 wallet addressed not found are ignored.
     *
     * @var ?array<string> $web3Wallet
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=web3_wallet')]
    public ?array $web3Wallet = null;

    /**
     * Returns users with the specified roles. Accepts up to 100 roles. Any roles not found are ignored.
     *
     * @var ?array<string> $role
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=role')]
    public ?array $role = null;

    /**
     * Returns users that match the given query.
     *
     * For possible matches, we check the email addresses, phone numbers, usernames, web3 wallets, user ids, first and last names.
     * The query value doesn't need to match the exact value you are looking for, it is capable of partial matches as well.
     *
     * @var ?string $query
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=query')]
    public ?string $query = null;

    /**
     * Returns users with emails that match the given query, via case-insensitive partial match.
     *
     * For example, `email_address_query=ello` will match a user with the email `HELLO@example.com`.
     *
     * @var ?string $emailAddressQuery
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=email_address_query')]
    public ?string $emailAddressQuery = null;

    /**
     * Returns users with phone numbers that match the given query, via case-insensitive partial match.
     *
     * For example, `phone_number_query=555` will match a user with the phone number `+1555xxxxxxx`.
     *
     * @var ?string $phoneNumberQuery
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=phone_number_query')]
    public ?string $phoneNumberQuery = null;

    /**
     * Returns users with usernames that match the given query, via case-insensitive partial match.
     *
     * For example, `username_query=CoolUser` will match a user with the username `SomeCoolUser`.
     *
     * @var ?string $usernameQuery
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=username_query')]
    public ?string $usernameQuery = null;

    /**
     * Returns users with names that match the given query, via case-insensitive partial match.
     *
     * @var ?string $nameQuery
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=name_query')]
    public ?string $nameQuery = null;

    /**
     * Returns users whose last session activity was before the given date (with millisecond precision).
     *
     * Example: use 1700690400000 to retrieve users whose last session activity was before 2023-11-23.
     *
     * @var ?int $lastActiveAtBefore
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=last_active_at_before')]
    public ?int $lastActiveAtBefore = null;

    /**
     * Returns users whose last session activity was after the given date (with millisecond precision).
     *
     * Example: use 1700690400000 to retrieve users whose last session activity was after 2023-11-23.
     *
     * @var ?int $lastActiveAtAfter
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=last_active_at_after')]
    public ?int $lastActiveAtAfter = null;

    /**
     * Returns users who have been created before the given date (with millisecond precision).
     *
     * Example: use 1730160000000 to retrieve users who have been created before 2024-10-29.
     *
     * @var ?int $createdAtBefore
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=created_at_before')]
    public ?int $createdAtBefore = null;

    /**
     * Returns users who have been created after the given date (with millisecond precision).
     *
     * Example: use 1730160000000 to retrieve users who have been created after 2024-10-29.
     *
     * @var ?int $createdAtAfter
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=created_at_after')]
    public ?int $createdAtAfter = null;

    /**
     * Applies a limit to the number of results returned.
     *
     * Can be used for paginating the results together with `offset`.
     *
     * @var ?int $limit
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=limit')]
    public ?int $limit = null;

    /**
     * Skip the first `offset` results when paginating.
     *
     * Needs to be an integer greater or equal to zero.
     * To be used in conjunction with `limit`.
     *
     * @var ?int $offset
     */
    #[SpeakeasyMetadata('queryParam:style=form,explode=true,name=offset')]
    public ?int $offset = null;

    /**
     * @param  string  $organizationId
     * @param  ?string  $orderBy
     * @param  ?array<string>  $userId
     * @param  ?array<string>  $emailAddress
     * @param  ?array<string>  $phoneNumber
     * @param  ?array<string>  $username
     * @param  ?array<string>  $web3Wallet
     * @param  ?array<string>  $role
     * @param  ?string  $query
     * @param  ?string  $emailAddressQuery
     * @param  ?string  $phoneNumberQuery
     * @param  ?string  $usernameQuery
     * @param  ?string  $nameQuery
     * @param  ?int  $lastActiveAtBefore
     * @param  ?int  $lastActiveAtAfter
     * @param  ?int  $createdAtBefore
     * @param  ?int  $createdAtAfter
     * @param  ?int  $limit
     * @param  ?int  $offset
     * @phpstan-pure
     */
    public function __construct(string $organizationId, ?string $orderBy = null, ?array $userId = null, ?array $emailAddress = null, ?array $phoneNumber = null, ?array $username = null, ?array $web3Wallet = null, ?array $role = null, ?string $query = null, ?string $emailAddressQuery = null, ?string $phoneNumberQuery = null, ?string $usernameQuery = null, ?string $nameQuery = null, ?int $lastActiveAtBefore = null, ?int $lastActiveAtAfter = null, ?int $createdAtBefore = null, ?int $createdAtAfter = null, ?int $limit = 10, ?int $offset = 0)
    {
        $this->organizationId = $organizationId;
        $this->orderBy = $orderBy;
        $this->userId = $userId;
        $this->emailAddress = $emailAddress;
        $this->phoneNumber = $phoneNumber;
        $this->username = $username;
        $this->web3Wallet = $web3Wallet;
        $this->role = $role;
        $this->query = $query;
        $this->emailAddressQuery = $emailAddressQuery;
        $this->phoneNumberQuery = $phoneNumberQuery;
        $this->usernameQuery = $usernameQuery;
        $this->nameQuery = $nameQuery;
        $this->lastActiveAtBefore = $lastActiveAtBefore;
        $this->lastActiveAtAfter = $lastActiveAtAfter;
        $this->createdAtBefore = $createdAtBefore;
        $this->createdAtAfter = $createdAtAfter;
        $this->limit = $limit;
        $this->offset = $offset;
    }
}
# Invitations
(*invitations*)

## Overview

Invitations allow you to invite someone to sign up to your application, via email.
<https://clerk.com/docs/authentication/invitations>

### Available Operations

* [createBulkInvitations](#createbulkinvitations) - Create multiple invitations
* [create](#create) - Create an invitation
* [list](#list) - List all invitations
* [revoke](#revoke) - Revokes an invitation

## createBulkInvitations

Use this API operation to create multiple invitations for the provided email addresses. You can choose to send the
invitations as emails by setting the `notify` parameter to `true`. There cannot be an existing invitation for any
of the email addresses you provide unless you set `ignore_existing` to `true` for specific email addresses. Please
note that there must be no existing user for any of the email addresses you provide, and this rule cannot be bypassed.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();

$request = [
    new Operations\RequestBody(
        emailAddress: 'Era_Pouros@yahoo.com',
    ),
];

$response = $sdk->invitations->createBulkInvitations(
    request: $request
);

if ($response->invitationList !== null) {
    // handle response
}
```

### Parameters

| Parameter                                  | Type                                       | Required                                   | Description                                |
| ------------------------------------------ | ------------------------------------------ | ------------------------------------------ | ------------------------------------------ |
| `$request`                                 | [array<Operations\RequestBody>](../../.md) | :heavy_check_mark:                         | The request object to use for the request. |

### Response

**[?Operations\CreateBulkInvitationsResponse](../../Models/Operations/CreateBulkInvitationsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 422            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## create

Creates a new invitation for the given email address and sends the invitation email.
Keep in mind that you cannot create an invitation if there is already one for the given email address.
Also, trying to create an invitation for an email address that already exists in your application will result to an error.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();

$request = new Operations\CreateInvitationRequestBody(
    emailAddress: 'Loyal79@yahoo.com',
);

$response = $sdk->invitations->create(
    request: $request
);

if ($response->invitation !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                        | Type                                                                                             | Required                                                                                         | Description                                                                                      |
| ------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------ |
| `$request`                                                                                       | [Operations\CreateInvitationRequestBody](../../Models/Operations/CreateInvitationRequestBody.md) | :heavy_check_mark:                                                                               | The request object to use for the request.                                                       |

### Response

**[?Operations\CreateInvitationResponse](../../Models/Operations/CreateInvitationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 422            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## list

Returns all non-revoked invitations for your application, sorted by creation date

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->invitations->list(
    limit: 10,
    offset: 0,
    status: Operations\ListInvitationsQueryParamStatus::Expired,
    query: '<value>'

);

if ($response->invitationList !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                 | Type                                                                                                                                      | Required                                                                                                                                  | Description                                                                                                                               |
| ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- |
| `limit`                                                                                                                                   | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Applies a limit to the number of results returned.<br/>Can be used for paginating the results together with `offset`.                     |
| `offset`                                                                                                                                  | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Skip the first `offset` results when paginating.<br/>Needs to be an integer greater or equal to zero.<br/>To be used in conjunction with `limit`. |
| `status`                                                                                                                                  | [?Operations\ListInvitationsQueryParamStatus](../../Models/Operations/ListInvitationsQueryParamStatus.md)                                 | :heavy_minus_sign:                                                                                                                        | Filter invitations based on their status                                                                                                  |
| `query`                                                                                                                                   | *?string*                                                                                                                                 | :heavy_minus_sign:                                                                                                                        | Filter invitations based on their `email_address` or `id`                                                                                 |

### Response

**[?Operations\ListInvitationsResponse](../../Models/Operations/ListInvitationsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## revoke

Revokes the given invitation.
Revoking an invitation will prevent the user from using the invitation link that was sent to them.
However, it doesn't prevent the user from signing up if they follow the sign up flow.
Only active (i.e. non-revoked) invitations can be revoked.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->invitations->revoke(
    invitationId: '<id>'
);

if ($response->invitationRevoked !== null) {
    // handle response
}
```

### Parameters

| Parameter                              | Type                                   | Required                               | Description                            |
| -------------------------------------- | -------------------------------------- | -------------------------------------- | -------------------------------------- |
| `invitationId`                         | *string*                               | :heavy_check_mark:                     | The ID of the invitation to be revoked |

### Response

**[?Operations\RevokeInvitationResponse](../../Models/Operations/RevokeInvitationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
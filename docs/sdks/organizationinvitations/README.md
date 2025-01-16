# OrganizationInvitations
(*organizationInvitations*)

## Overview

### Available Operations

* [create](#create) - Create and send an organization invitation
* [bulkCreate](#bulkcreate) - Bulk create and send organization invitations
* [get](#get) - Retrieve an organization invitation by ID
* [getAll](#getall) - Get a list of organization invitations for the current instance
* [list](#list) - Get a list of organization invitations
* [~~listPending~~](#listpending) - Get a list of pending organization invitations :warning: **Deprecated**
* [revoke](#revoke) - Revoke a pending organization invitation

## create

Creates a new organization invitation and sends an email to the provided `email_address` with a link to accept the invitation and join the organization.
You can specify the `role` for the invited organization member.

New organization invitations get a "pending" status until they are revoked by an organization administrator or accepted by the invitee.

The request body supports passing an optional `redirect_url` parameter.
When the invited user clicks the link to accept the invitation, they will be redirected to the URL provided.
Use this parameter to implement a custom invitation acceptance flow.

You can specify the ID of the user that will send the invitation with the `inviter_user_id` parameter.
That user must be a member with administrator privileges in the organization.
Only "admin" members can create organization invitations.

You can optionally provide public and private metadata for the organization invitation.
The public metadata are visible by both the Frontend and the Backend whereas the private ones only by the Backend.
When the organization invitation is accepted, the metadata will be transferred to the newly created organization membership.

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

$requestBody = new Operations\CreateOrganizationInvitationRequestBody(
    emailAddress: 'Loyal79@yahoo.com',
    role: '<value>',
);

$response = $sdk->organizationInvitations->create(
    organizationId: '<id>',
    requestBody: $requestBody

);

if ($response->organizationInvitation !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                | Type                                                                                                                     | Required                                                                                                                 | Description                                                                                                              |
| ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ |
| `organizationId`                                                                                                         | *string*                                                                                                                 | :heavy_check_mark:                                                                                                       | The ID of the organization for which to send the invitation                                                              |
| `requestBody`                                                                                                            | [Operations\CreateOrganizationInvitationRequestBody](../../Models/Operations/CreateOrganizationInvitationRequestBody.md) | :heavy_check_mark:                                                                                                       | N/A                                                                                                                      |

### Response

**[?Operations\CreateOrganizationInvitationResponse](../../Models/Operations/CreateOrganizationInvitationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 403, 404, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## bulkCreate

Creates new organization invitations in bulk and sends out emails to the provided email addresses with a link to accept the invitation and join the organization.
You can specify a different `role` for each invited organization member.
New organization invitations get a "pending" status until they are revoked by an organization administrator or accepted by the invitee.
The request body supports passing an optional `redirect_url` parameter for each invitation.
When the invited user clicks the link to accept the invitation, they will be redirected to the provided URL.
Use this parameter to implement a custom invitation acceptance flow.
You can specify the ID of the user that will send the invitation with the `inviter_user_id` parameter. Each invitation
can have a different inviter user.
Inviter users must be members with administrator privileges in the organization.
Only "admin" members can create organization invitations.
You can optionally provide public and private metadata for each organization invitation. The public metadata are visible
by both the Frontend and the Backend, whereas the private metadata are only visible by the Backend.
When the organization invitation is accepted, the metadata will be transferred to the newly created organization membership.

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



$response = $sdk->organizationInvitations->bulkCreate(
    organizationId: '<id>',
    requestBody: [
        new Operations\RequestBody(
            emailAddress: 'Queen25@gmail.com',
            role: '<value>',
        ),
    ]

);

if ($response->organizationInvitations !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                               | Type                                                                    | Required                                                                | Description                                                             |
| ----------------------------------------------------------------------- | ----------------------------------------------------------------------- | ----------------------------------------------------------------------- | ----------------------------------------------------------------------- |
| `organizationId`                                                        | *string*                                                                | :heavy_check_mark:                                                      | The organization ID.                                                    |
| `requestBody`                                                           | array<[Operations\RequestBody](../../Models/Operations/RequestBody.md)> | :heavy_check_mark:                                                      | N/A                                                                     |

### Response

**[?Operations\CreateOrganizationInvitationBulkResponse](../../Models/Operations/CreateOrganizationInvitationBulkResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 403, 404, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## get

Use this request to get an existing organization invitation by ID.

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



$response = $sdk->organizationInvitations->get(
    organizationId: '<id>',
    invitationId: '<id>'

);

if ($response->organizationInvitation !== null) {
    // handle response
}
```

### Parameters

| Parameter                       | Type                            | Required                        | Description                     |
| ------------------------------- | ------------------------------- | ------------------------------- | ------------------------------- |
| `organizationId`                | *string*                        | :heavy_check_mark:              | The organization ID.            |
| `invitationId`                  | *string*                        | :heavy_check_mark:              | The organization invitation ID. |

### Response

**[?Operations\GetOrganizationInvitationResponse](../../Models/Operations/GetOrganizationInvitationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 403, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## getAll

This request returns the list of organization invitations for the instance.
Results can be paginated using the optional `limit` and `offset` query parameters.
You can filter them by providing the 'status' query parameter, that accepts multiple values.
You can change the order by providing the 'order' query parameter, that accepts multiple values.
You can filter by the invited user email address providing the `query` query parameter.
The organization invitations are ordered by descending creation date by default.

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

$request = new Operations\ListInstanceOrganizationInvitationsRequest();

$response = $sdk->organizationInvitations->getAll(
    request: $request
);

if ($response->organizationInvitationsWithPublicOrganizationData !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                      | Type                                                                                                                           | Required                                                                                                                       | Description                                                                                                                    |
| ------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                                     | [Operations\ListInstanceOrganizationInvitationsRequest](../../Models/Operations/ListInstanceOrganizationInvitationsRequest.md) | :heavy_check_mark:                                                                                                             | The request object to use for the request.                                                                                     |

### Response

**[?Operations\ListInstanceOrganizationInvitationsResponse](../../Models/Operations/ListInstanceOrganizationInvitationsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 404, 422       | application/json    |
| Errors\ClerkErrors  | 500                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## list

This request returns the list of organization invitations.
Results can be paginated using the optional `limit` and `offset` query parameters.
You can filter them by providing the 'status' query parameter, that accepts multiple values.
The organization invitations are ordered by descending creation date.
Most recent invitations will be returned first.
Any invitations created as a result of an Organization Domain are not included in the results.

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



$response = $sdk->organizationInvitations->list(
    organizationId: '<id>',
    limit: 10,
    offset: 0,
    status: Operations\ListOrganizationInvitationsQueryParamStatus::Revoked

);

if ($response->organizationInvitations !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                 | Type                                                                                                                                      | Required                                                                                                                                  | Description                                                                                                                               |
| ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- |
| `organizationId`                                                                                                                          | *string*                                                                                                                                  | :heavy_check_mark:                                                                                                                        | The organization ID.                                                                                                                      |
| `limit`                                                                                                                                   | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Applies a limit to the number of results returned.<br/>Can be used for paginating the results together with `offset`.                     |
| `offset`                                                                                                                                  | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Skip the first `offset` results when paginating.<br/>Needs to be an integer greater or equal to zero.<br/>To be used in conjunction with `limit`. |
| `status`                                                                                                                                  | [?Operations\ListOrganizationInvitationsQueryParamStatus](../../Models/Operations/ListOrganizationInvitationsQueryParamStatus.md)         | :heavy_minus_sign:                                                                                                                        | Filter organization invitations based on their status                                                                                     |

### Response

**[?Operations\ListOrganizationInvitationsResponse](../../Models/Operations/ListOrganizationInvitationsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## ~~listPending~~

This request returns the list of organization invitations with "pending" status.
These are the organization invitations that can still be used to join the organization, but have not been accepted by the invited user yet.
Results can be paginated using the optional `limit` and `offset` query parameters.
The organization invitations are ordered by descending creation date.
Most recent invitations will be returned first.
Any invitations created as a result of an Organization Domain are not included in the results.

> :warning: **DEPRECATED**: This will be removed in a future release, please migrate away from it as soon as possible.

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



$response = $sdk->organizationInvitations->listPending(
    organizationId: '<id>',
    limit: 10,
    offset: 0

);

if ($response->organizationInvitations !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                 | Type                                                                                                                                      | Required                                                                                                                                  | Description                                                                                                                               |
| ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- |
| `organizationId`                                                                                                                          | *string*                                                                                                                                  | :heavy_check_mark:                                                                                                                        | The organization ID.                                                                                                                      |
| `limit`                                                                                                                                   | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Applies a limit to the number of results returned.<br/>Can be used for paginating the results together with `offset`.                     |
| `offset`                                                                                                                                  | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Skip the first `offset` results when paginating.<br/>Needs to be an integer greater or equal to zero.<br/>To be used in conjunction with `limit`. |

### Response

**[?Operations\ListPendingOrganizationInvitationsResponse](../../Models/Operations/ListPendingOrganizationInvitationsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## revoke

Use this request to revoke a previously issued organization invitation.
Revoking an organization invitation makes it invalid; the invited user will no longer be able to join the organization with the revoked invitation.
Only organization invitations with "pending" status can be revoked.
The request accepts the `requesting_user_id` parameter to specify the user which revokes the invitation.
Only users with "admin" role can revoke invitations.

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

$requestBody = new Operations\RevokeOrganizationInvitationRequestBody();

$response = $sdk->organizationInvitations->revoke(
    organizationId: '<id>',
    invitationId: '<id>',
    requestBody: $requestBody

);

if ($response->organizationInvitation !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                 | Type                                                                                                                      | Required                                                                                                                  | Description                                                                                                               |
| ------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------- |
| `organizationId`                                                                                                          | *string*                                                                                                                  | :heavy_check_mark:                                                                                                        | The organization ID.                                                                                                      |
| `invitationId`                                                                                                            | *string*                                                                                                                  | :heavy_check_mark:                                                                                                        | The organization invitation ID.                                                                                           |
| `requestBody`                                                                                                             | [?Operations\RevokeOrganizationInvitationRequestBody](../../Models/Operations/RevokeOrganizationInvitationRequestBody.md) | :heavy_minus_sign:                                                                                                        | N/A                                                                                                                       |

### Response

**[?Operations\RevokeOrganizationInvitationResponse](../../Models/Operations/RevokeOrganizationInvitationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 403, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
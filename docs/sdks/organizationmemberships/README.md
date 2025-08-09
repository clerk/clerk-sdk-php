# OrganizationMemberships
(*organizationMemberships*)

## Overview

### Available Operations

* [create](#create) - Create a new organization membership
* [list](#list) - Get a list of all members of an organization
* [update](#update) - Update an organization membership
* [delete](#delete) - Remove a member from an organization
* [updateMetadata](#updatemetadata) - Merge and update organization membership metadata

## create

Adds a user as a member to the given organization.
Only users in the same instance as the organization can be added as members.

This organization will be the user's [active organization] (https://clerk.com/docs/organizations/overview#active-organization)
the next time they create a session, presuming they don't explicitly set a
different organization as active before then.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateOrganizationMembership" method="post" path="/organizations/{organization_id}/memberships" -->
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

$requestBody = new Operations\CreateOrganizationMembershipRequestBody(
    userId: '<id>',
    role: '<value>',
);

$response = $sdk->organizationMemberships->create(
    organizationId: '<id>',
    requestBody: $requestBody

);

if ($response->organizationMembership !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                | Type                                                                                                                     | Required                                                                                                                 | Description                                                                                                              |
| ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ |
| `organizationId`                                                                                                         | *string*                                                                                                                 | :heavy_check_mark:                                                                                                       | The ID of the organization where the new membership will be created                                                      |
| `requestBody`                                                                                                            | [Operations\CreateOrganizationMembershipRequestBody](../../Models/Operations/CreateOrganizationMembershipRequestBody.md) | :heavy_check_mark:                                                                                                       | N/A                                                                                                                      |

### Response

**[?Operations\CreateOrganizationMembershipResponse](../../Models/Operations/CreateOrganizationMembershipResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 403, 404, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## list

Retrieves all user memberships for the given organization

### Example Usage

<!-- UsageSnippet language="php" operationID="ListOrganizationMemberships" method="get" path="/organizations/{organization_id}/memberships" -->
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

$request = new Operations\ListOrganizationMembershipsRequest(
    organizationId: '<id>',
    lastActiveAtBefore: 1700690400000,
    lastActiveAtAfter: 1700690400000,
    createdAtBefore: 1730160000000,
    createdAtAfter: 1730160000000,
);

$response = $sdk->organizationMemberships->list(
    request: $request
);

if ($response->organizationMemberships !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                      | Type                                                                                                           | Required                                                                                                       | Description                                                                                                    |
| -------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                     | [Operations\ListOrganizationMembershipsRequest](../../Models/Operations/ListOrganizationMembershipsRequest.md) | :heavy_check_mark:                                                                                             | The request object to use for the request.                                                                     |

### Response

**[?Operations\ListOrganizationMembershipsResponse](../../Models/Operations/ListOrganizationMembershipsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 422            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## update

Updates the properties of an existing organization membership

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateOrganizationMembership" method="patch" path="/organizations/{organization_id}/memberships/{user_id}" -->
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

$requestBody = new Operations\UpdateOrganizationMembershipRequestBody(
    role: '<value>',
);

$response = $sdk->organizationMemberships->update(
    organizationId: '<id>',
    userId: '<id>',
    requestBody: $requestBody

);

if ($response->organizationMembership !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                | Type                                                                                                                     | Required                                                                                                                 | Description                                                                                                              |
| ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ |
| `organizationId`                                                                                                         | *string*                                                                                                                 | :heavy_check_mark:                                                                                                       | The ID of the organization to which the membership belongs                                                               |
| `userId`                                                                                                                 | *string*                                                                                                                 | :heavy_check_mark:                                                                                                       | The ID of the user that this membership belongs to                                                                       |
| `requestBody`                                                                                                            | [Operations\UpdateOrganizationMembershipRequestBody](../../Models/Operations/UpdateOrganizationMembershipRequestBody.md) | :heavy_check_mark:                                                                                                       | N/A                                                                                                                      |

### Response

**[?Operations\UpdateOrganizationMembershipResponse](../../Models/Operations/UpdateOrganizationMembershipResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 404, 422            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## delete

Removes the given membership from the organization

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteOrganizationMembership" method="delete" path="/organizations/{organization_id}/memberships/{user_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->organizationMemberships->delete(
    organizationId: '<id>',
    userId: '<id>'

);

if ($response->organizationMembership !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                  | Type                                                       | Required                                                   | Description                                                |
| ---------------------------------------------------------- | ---------------------------------------------------------- | ---------------------------------------------------------- | ---------------------------------------------------------- |
| `organizationId`                                           | *string*                                                   | :heavy_check_mark:                                         | The ID of the organization to which the membership belongs |
| `userId`                                                   | *string*                                                   | :heavy_check_mark:                                         | The ID of the user that this membership belongs to         |

### Response

**[?Operations\DeleteOrganizationMembershipResponse](../../Models/Operations/DeleteOrganizationMembershipResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 404, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## updateMetadata

Update an organization membership's metadata attributes by merging existing values with the provided parameters.
Metadata values will be updated via a deep merge. Deep means that any nested JSON objects will be merged as well.
You can remove metadata keys at any level by setting their value to `null`.

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateOrganizationMembershipMetadata" method="patch" path="/organizations/{organization_id}/memberships/{user_id}/metadata" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->organizationMemberships->updateMetadata(
    organizationId: '<id>',
    userId: '<id>',
    requestBody: $requestBody

);

if ($response->organizationMembership !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                 | Type                                                                                                                                      | Required                                                                                                                                  | Description                                                                                                                               |
| ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- |
| `organizationId`                                                                                                                          | *string*                                                                                                                                  | :heavy_check_mark:                                                                                                                        | The ID of the organization to which the membership belongs                                                                                |
| `userId`                                                                                                                                  | *string*                                                                                                                                  | :heavy_check_mark:                                                                                                                        | The ID of the user that this membership belongs to                                                                                        |
| `requestBody`                                                                                                                             | [?Operations\UpdateOrganizationMembershipMetadataRequestBody](../../Models/Operations/UpdateOrganizationMembershipMetadataRequestBody.md) | :heavy_minus_sign:                                                                                                                        | N/A                                                                                                                                       |

### Response

**[?Operations\UpdateOrganizationMembershipMetadataResponse](../../Models/Operations/UpdateOrganizationMembershipMetadataResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 404, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
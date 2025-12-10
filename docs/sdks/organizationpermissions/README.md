# OrganizationPermissions

## Overview

### Available Operations

* [list](#list) - Get a list of all organization permissions
* [create](#create) - Create a new organization permission
* [get](#get) - Get an organization permission
* [update](#update) - Update an organization permission
* [delete](#delete) - Delete an organization permission

## list

Retrieves all organization permissions for the given instance.

### Example Usage

<!-- UsageSnippet language="php" operationID="ListOrganizationPermissions" method="get" path="/organization_permissions" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->organizationPermissions->list(
    limit: 10,
    offset: 0

);

if ($response->permissions !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                                                                                                                                                                                                                                            | Type                                                                                                                                                                                                                                                                                                                                                                                                                 | Required                                                                                                                                                                                                                                                                                                                                                                                                             | Description                                                                                                                                                                                                                                                                                                                                                                                                          |
| -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `query`                                                                                                                                                                                                                                                                                                                                                                                                              | *?string*                                                                                                                                                                                                                                                                                                                                                                                                            | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                                                   | Returns organization permissions with ID, name, or key that match the given query.<br/>Uses exact match for permission ID and partial match for name and key.                                                                                                                                                                                                                                                        |
| `orderBy`                                                                                                                                                                                                                                                                                                                                                                                                            | *?string*                                                                                                                                                                                                                                                                                                                                                                                                            | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                                                   | Allows to return organization permissions in a particular order.<br/>At the moment, you can order the returned permissions by their `created_at`, `name`, or `key`.<br/>In order to specify the direction, you can use the `+/-` symbols prepended in the property to order by.<br/>For example, if you want permissions to be returned in descending order according to their `created_at` property, you can use `-created_at`. |
| `limit`                                                                                                                                                                                                                                                                                                                                                                                                              | *?int*                                                                                                                                                                                                                                                                                                                                                                                                               | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                                                   | Applies a limit to the number of results returned.<br/>Can be used for paginating the results together with `offset`.                                                                                                                                                                                                                                                                                                |
| `offset`                                                                                                                                                                                                                                                                                                                                                                                                             | *?int*                                                                                                                                                                                                                                                                                                                                                                                                               | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                                                   | Skip the first `offset` results when paginating.<br/>Needs to be an integer greater or equal to zero.<br/>To be used in conjunction with `limit`.                                                                                                                                                                                                                                                                    |

### Response

**[?Operations\ListOrganizationPermissionsResponse](../../Models/Operations/ListOrganizationPermissionsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 422            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## create

Creates a new organization permission for the given instance.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateOrganizationPermission" method="post" path="/organization_permissions" -->
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

$request = new Operations\CreateOrganizationPermissionRequestBody(
    name: '<value>',
    key: '<key>',
);

$response = $sdk->organizationPermissions->create(
    request: $request
);

if ($response->permission !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                | Type                                                                                                                     | Required                                                                                                                 | Description                                                                                                              |
| ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                               | [Operations\CreateOrganizationPermissionRequestBody](../../Models/Operations/CreateOrganizationPermissionRequestBody.md) | :heavy_check_mark:                                                                                                       | The request object to use for the request.                                                                               |

### Response

**[?Operations\CreateOrganizationPermissionResponse](../../Models/Operations/CreateOrganizationPermissionResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 402, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## get

Retrieves the details of an organization permission.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetOrganizationPermission" method="get" path="/organization_permissions/{permission_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->organizationPermissions->get(
    permissionId: '<id>'
);

if ($response->permission !== null) {
    // handle response
}
```

### Parameters

| Parameter                            | Type                                 | Required                             | Description                          |
| ------------------------------------ | ------------------------------------ | ------------------------------------ | ------------------------------------ |
| `permissionId`                       | *string*                             | :heavy_check_mark:                   | The ID of the permission to retrieve |

### Response

**[?Operations\GetOrganizationPermissionResponse](../../Models/Operations/GetOrganizationPermissionResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## update

Updates the properties of an existing organization permission.
System permissions cannot be updated.

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateOrganizationPermission" method="patch" path="/organization_permissions/{permission_id}" -->
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

$requestBody = new Operations\UpdateOrganizationPermissionRequestBody();

$response = $sdk->organizationPermissions->update(
    permissionId: '<id>',
    requestBody: $requestBody

);

if ($response->permission !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                | Type                                                                                                                     | Required                                                                                                                 | Description                                                                                                              |
| ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ |
| `permissionId`                                                                                                           | *string*                                                                                                                 | :heavy_check_mark:                                                                                                       | The ID of the permission to update                                                                                       |
| `requestBody`                                                                                                            | [Operations\UpdateOrganizationPermissionRequestBody](../../Models/Operations/UpdateOrganizationPermissionRequestBody.md) | :heavy_check_mark:                                                                                                       | N/A                                                                                                                      |

### Response

**[?Operations\UpdateOrganizationPermissionResponse](../../Models/Operations/UpdateOrganizationPermissionResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## delete

Deletes an organization permission.
System permissions cannot be deleted.

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteOrganizationPermission" method="delete" path="/organization_permissions/{permission_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->organizationPermissions->delete(
    permissionId: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                          | Type                               | Required                           | Description                        |
| ---------------------------------- | ---------------------------------- | ---------------------------------- | ---------------------------------- |
| `permissionId`                     | *string*                           | :heavy_check_mark:                 | The ID of the permission to delete |

### Response

**[?Operations\DeleteOrganizationPermissionResponse](../../Models/Operations/DeleteOrganizationPermissionResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
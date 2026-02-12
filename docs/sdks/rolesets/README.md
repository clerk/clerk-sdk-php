# RoleSets

## Overview

### Available Operations

* [list](#list) - Get a list of role sets
* [create](#create) - Create a role set
* [get](#get) - Retrieve a role set
* [update](#update) - Update a role set
* [replace](#replace) - Replace a role set
* [addRoles](#addroles) - Add roles to a role set
* [replaceRole](#replacerole) - Replace a role in a role set

## list

Returns a list of role sets for the instance.
Results can be paginated using the optional `limit` and `offset` query parameters.
The role sets are ordered by descending creation date by default.

### Example Usage

<!-- UsageSnippet language="php" operationID="ListRoleSets" method="get" path="/role_sets" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->roleSets->list(
    orderBy: '-created_at',
    limit: 10,
    offset: 0

);

if ($response->roleSets !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                                                                                                                                                                                                                                                                                                      | Type                                                                                                                                                                                                                                                                                                                                                                                                                                                                           | Required                                                                                                                                                                                                                                                                                                                                                                                                                                                                       | Description                                                                                                                                                                                                                                                                                                                                                                                                                                                                    |
| ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| `query`                                                                                                                                                                                                                                                                                                                                                                                                                                                                        | *?string*                                                                                                                                                                                                                                                                                                                                                                                                                                                                      | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                                                                                                             | Returns role sets with ID, name, or key that match the given query.<br/>Uses exact match for role set ID and partial match for name and key.                                                                                                                                                                                                                                                                                                                                   |
| `orderBy`                                                                                                                                                                                                                                                                                                                                                                                                                                                                      | *?string*                                                                                                                                                                                                                                                                                                                                                                                                                                                                      | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                                                                                                             | Allows to return role sets in a particular order.<br/>At the moment, you can order the returned role sets by their `created_at`, `name`, or `key`.<br/>In order to specify the direction, you can use the `+/-` symbols prepended in the property to order by.<br/>For example, if you want role sets to be returned in descending order according to their `created_at` property, you can use `-created_at`.<br/>If you don't use `+` or `-`, then `+` is implied.<br/>Defaults to `-created_at`. |
| `limit`                                                                                                                                                                                                                                                                                                                                                                                                                                                                        | *?int*                                                                                                                                                                                                                                                                                                                                                                                                                                                                         | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                                                                                                             | Applies a limit to the number of results returned.<br/>Can be used for paginating the results together with `offset`.                                                                                                                                                                                                                                                                                                                                                          |
| `offset`                                                                                                                                                                                                                                                                                                                                                                                                                                                                       | *?int*                                                                                                                                                                                                                                                                                                                                                                                                                                                                         | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                                                                                                             | Skip the first `offset` results when paginating.<br/>Needs to be an integer greater or equal to zero.<br/>To be used in conjunction with `limit`.                                                                                                                                                                                                                                                                                                                              |

### Response

**[?Operations\ListRoleSetsResponse](../../Models/Operations/ListRoleSetsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## create

Creates a new role set with the given name and roles.
The key must be unique for the instance and start with the 'role_set:' prefix, followed by lowercase alphanumeric characters and underscores only.
You must provide at least one role and specify a default role key and creator role key.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateRoleSet" method="post" path="/role_sets" -->
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

$request = new Operations\CreateRoleSetRequestBody(
    name: '<value>',
    defaultRoleKey: '<value>',
    creatorRoleKey: '<value>',
    roles: [
        '<value 1>',
        '<value 2>',
    ],
);

$response = $sdk->roleSets->create(
    request: $request
);

if ($response->roleSet !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                  | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `$request`                                                                                 | [Operations\CreateRoleSetRequestBody](../../Models/Operations/CreateRoleSetRequestBody.md) | :heavy_check_mark:                                                                         | The request object to use for the request.                                                 |

### Response

**[?Operations\CreateRoleSetResponse](../../Models/Operations/CreateRoleSetResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\ClerkErrors           | 400, 401, 402, 403, 404, 422 | application/json             |
| Errors\SDKException          | 4XX, 5XX                     | \*/\*                        |

## get

Retrieves an existing role set by its key or ID.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetRoleSet" method="get" path="/role_sets/{role_set_key_or_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->roleSets->get(
    roleSetKeyOrId: '<id>'
);

if ($response->roleSet !== null) {
    // handle response
}
```

### Parameters

| Parameter                     | Type                          | Required                      | Description                   |
| ----------------------------- | ----------------------------- | ----------------------------- | ----------------------------- |
| `roleSetKeyOrId`              | *string*                      | :heavy_check_mark:            | The key or ID of the role set |

### Response

**[?Operations\GetRoleSetResponse](../../Models/Operations/GetRoleSetResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## update

Updates an existing role set.
You can update the name, key, description, type, default role, or creator role.
All parameters are optional - you can update only the fields you want to change.

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateRoleSet" method="patch" path="/role_sets/{role_set_key_or_id}" -->
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

$requestBody = new Operations\UpdateRoleSetRequestBody();

$response = $sdk->roleSets->update(
    roleSetKeyOrId: '<id>',
    requestBody: $requestBody

);

if ($response->roleSet !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                  | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `roleSetKeyOrId`                                                                           | *string*                                                                                   | :heavy_check_mark:                                                                         | The key or ID of the role set to update                                                    |
| `requestBody`                                                                              | [Operations\UpdateRoleSetRequestBody](../../Models/Operations/UpdateRoleSetRequestBody.md) | :heavy_check_mark:                                                                         | N/A                                                                                        |

### Response

**[?Operations\UpdateRoleSetResponse](../../Models/Operations/UpdateRoleSetResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## replace

Replaces a role set with another role set. This is functionally equivalent to deleting
the role set but allows for atomic replacement with migration support.
Organizations using this role set will be migrated to the destination role set.

### Example Usage

<!-- UsageSnippet language="php" operationID="ReplaceRoleSet" method="post" path="/role_sets/{role_set_key_or_id}/replace" -->
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

$requestBody = new Operations\ReplaceRoleSetRequestBody(
    destRoleSetKey: '<value>',
);

$response = $sdk->roleSets->replace(
    roleSetKeyOrId: '<id>',
    requestBody: $requestBody

);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                    | Type                                                                                         | Required                                                                                     | Description                                                                                  |
| -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- |
| `roleSetKeyOrId`                                                                             | *string*                                                                                     | :heavy_check_mark:                                                                           | The key or ID of the role set to replace                                                     |
| `requestBody`                                                                                | [Operations\ReplaceRoleSetRequestBody](../../Models/Operations/ReplaceRoleSetRequestBody.md) | :heavy_check_mark:                                                                           | N/A                                                                                          |

### Response

**[?Operations\ReplaceRoleSetResponse](../../Models/Operations/ReplaceRoleSetResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## addRoles

Adds one or more roles to an existing role set.
You can optionally update the default role or creator role when adding new roles.

### Example Usage

<!-- UsageSnippet language="php" operationID="AddRolesToRoleSet" method="post" path="/role_sets/{role_set_key_or_id}/roles" -->
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

$requestBody = new Operations\AddRolesToRoleSetRequestBody(
    roleKeys: [
        '<value 1>',
        '<value 2>',
    ],
);

$response = $sdk->roleSets->addRoles(
    roleSetKeyOrId: '<id>',
    requestBody: $requestBody

);

if ($response->roleSet !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                          | Type                                                                                               | Required                                                                                           | Description                                                                                        |
| -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- |
| `roleSetKeyOrId`                                                                                   | *string*                                                                                           | :heavy_check_mark:                                                                                 | The key or ID of the role set                                                                      |
| `requestBody`                                                                                      | [Operations\AddRolesToRoleSetRequestBody](../../Models/Operations/AddRolesToRoleSetRequestBody.md) | :heavy_check_mark:                                                                                 | N/A                                                                                                |

### Response

**[?Operations\AddRolesToRoleSetResponse](../../Models/Operations/AddRolesToRoleSetResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## replaceRole

Replaces a role in a role set with another role. This atomically removes
the source role and reassigns any members to the destination role.

### Example Usage

<!-- UsageSnippet language="php" operationID="ReplaceRoleInRoleSet" method="post" path="/role_sets/{role_set_key_or_id}/roles/replace" -->
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

$requestBody = new Operations\ReplaceRoleInRoleSetRequestBody(
    roleKey: '<value>',
    toRoleKey: '<value>',
);

$response = $sdk->roleSets->replaceRole(
    roleSetKeyOrId: '<id>',
    requestBody: $requestBody

);

if ($response->roleSet !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                | Type                                                                                                     | Required                                                                                                 | Description                                                                                              |
| -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- |
| `roleSetKeyOrId`                                                                                         | *string*                                                                                                 | :heavy_check_mark:                                                                                       | The key or ID of the role set                                                                            |
| `requestBody`                                                                                            | [Operations\ReplaceRoleInRoleSetRequestBody](../../Models/Operations/ReplaceRoleInRoleSetRequestBody.md) | :heavy_check_mark:                                                                                       | N/A                                                                                                      |

### Response

**[?Operations\ReplaceRoleInRoleSetResponse](../../Models/Operations/ReplaceRoleInRoleSetResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |
# Directories

## Overview

### Available Operations

* [list](#list) - List all directories
* [create](#create) - Create a directory
* [get](#get) - Retrieve a directory
* [update](#update) - Update a directory
* [delete](#delete) - Delete a directory
* [rotateApiKey](#rotateapikey) - Rotate a directory's API key
* [listGroupRoleMappings](#listgrouprolemappings) - List directory group role mappings
* [createGroupRoleMapping](#creategrouprolemapping) - Create a directory group role mapping
* [replaceGroupRoleMappings](#replacegrouprolemappings) - Replace directory group role mappings
* [deleteGroupRoleMapping](#deletegrouprolemapping) - Delete a directory group role mapping

## list

Returns a list of all directories for the instance.

### Example Usage

<!-- UsageSnippet language="php" operationID="ListDirectories" method="get" path="/directories" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->directories->list(
    limit: 10,
    offset: 0

);

if ($response->directoryList !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                 | Type                                                                                                                                      | Required                                                                                                                                  | Description                                                                                                                               |
| ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- |
| `limit`                                                                                                                                   | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Applies a limit to the number of results returned.<br/>Can be used for paginating the results together with `offset`.                     |
| `offset`                                                                                                                                  | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Skip the first `offset` results when paginating.<br/>Needs to be an integer greater or equal to zero.<br/>To be used in conjunction with `limit`. |

### Response

**[?Operations\ListDirectoriesResponse](../../Models/Operations/ListDirectoriesResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## create

Create a new directory for the instance.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateDirectory" method="post" path="/directories" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->directories->create(
    request: $request
);

if ($response->directory !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                      | Type                                                                                           | Required                                                                                       | Description                                                                                    |
| ---------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------- |
| `$request`                                                                                     | [Operations\CreateDirectoryRequestBody](../../Models/Operations/CreateDirectoryRequestBody.md) | :heavy_check_mark:                                                                             | The request object to use for the request.                                                     |

### Response

**[?Operations\CreateDirectoryResponse](../../Models/Operations/CreateDirectoryResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## get

Returns the details of a directory.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetDirectory" method="get" path="/directories/{directory_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->directories->get(
    directoryId: '<id>'
);

if ($response->directory !== null) {
    // handle response
}
```

### Parameters

| Parameter                           | Type                                | Required                            | Description                         |
| ----------------------------------- | ----------------------------------- | ----------------------------------- | ----------------------------------- |
| `directoryId`                       | *string*                            | :heavy_check_mark:                  | The ID of the directory to retrieve |

### Response

**[?Operations\GetDirectoryResponse](../../Models/Operations/GetDirectoryResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## update

Updates a directory.

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateDirectory" method="patch" path="/directories/{directory_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->directories->update(
    directoryId: '<id>',
    requestBody: $requestBody

);

if ($response->directory !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                       | Type                                                                                            | Required                                                                                        | Description                                                                                     |
| ----------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------- |
| `directoryId`                                                                                   | *string*                                                                                        | :heavy_check_mark:                                                                              | The ID of the directory to update                                                               |
| `requestBody`                                                                                   | [?Operations\UpdateDirectoryRequestBody](../../Models/Operations/UpdateDirectoryRequestBody.md) | :heavy_minus_sign:                                                                              | N/A                                                                                             |

### Response

**[?Operations\UpdateDirectoryResponse](../../Models/Operations/UpdateDirectoryResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## delete

Deletes a directory and stops provisioning for it. Provisioning requests authenticated
with the directory's API key are rejected afterwards.

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteDirectory" method="delete" path="/directories/{directory_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->directories->delete(
    directoryId: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                         | Type                              | Required                          | Description                       |
| --------------------------------- | --------------------------------- | --------------------------------- | --------------------------------- |
| `directoryId`                     | *string*                          | :heavy_check_mark:                | The ID of the directory to delete |

### Response

**[?Operations\DeleteDirectoryResponse](../../Models/Operations/DeleteDirectoryResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## rotateApiKey

Generates a new API key for the directory and returns it in the `api_key` field.
This is the only way to obtain the key after creation, so make sure to update it in
your identity provider. The previous key remains valid for a short grace period before
it expires.

### Example Usage

<!-- UsageSnippet language="php" operationID="RotateDirectoryAPIKey" method="post" path="/directories/{directory_id}/rotate_api_key" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->directories->rotateApiKey(
    directoryId: '<id>'
);

if ($response->directory !== null) {
    // handle response
}
```

### Parameters

| Parameter                                       | Type                                            | Required                                        | Description                                     |
| ----------------------------------------------- | ----------------------------------------------- | ----------------------------------------------- | ----------------------------------------------- |
| `directoryId`                                   | *string*                                        | :heavy_check_mark:                              | The ID of the directory whose API key to rotate |

### Response

**[?Operations\RotateDirectoryAPIKeyResponse](../../Models/Operations/RotateDirectoryAPIKeyResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## listGroupRoleMappings

Returns the list of directory group to organization role mappings for a directory, ordered by precedence.

### Example Usage

<!-- UsageSnippet language="php" operationID="ListDirectoryGroupRoleMappings" method="get" path="/directories/{directory_id}/group_role_mappings" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->directories->listGroupRoleMappings(
    directoryId: '<id>'
);

if ($response->directoryGroupRoleMappingList !== null) {
    // handle response
}
```

### Parameters

| Parameter                | Type                     | Required                 | Description              |
| ------------------------ | ------------------------ | ------------------------ | ------------------------ |
| `directoryId`            | *string*                 | :heavy_check_mark:       | The ID of the directory. |

### Response

**[?Operations\ListDirectoryGroupRoleMappingsResponse](../../Models/Operations/ListDirectoryGroupRoleMappingsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## createGroupRoleMapping

Creates a new directory group to organization role mapping for a directory.
Group role mapping must be enabled on the directory.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateDirectoryGroupRoleMapping" method="post" path="/directories/{directory_id}/group_role_mappings" -->
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

$requestBody = new Operations\CreateDirectoryGroupRoleMappingRequestBody(
    roleId: '<id>',
);

$response = $sdk->directories->createGroupRoleMapping(
    directoryId: '<id>',
    requestBody: $requestBody

);

if ($response->directoryGroupRoleMapping !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                      | Type                                                                                                                           | Required                                                                                                                       | Description                                                                                                                    |
| ------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------ |
| `directoryId`                                                                                                                  | *string*                                                                                                                       | :heavy_check_mark:                                                                                                             | The ID of the directory.                                                                                                       |
| `requestBody`                                                                                                                  | [Operations\CreateDirectoryGroupRoleMappingRequestBody](../../Models/Operations/CreateDirectoryGroupRoleMappingRequestBody.md) | :heavy_check_mark:                                                                                                             | N/A                                                                                                                            |

### Response

**[?Operations\CreateDirectoryGroupRoleMappingResponse](../../Models/Operations/CreateDirectoryGroupRoleMappingResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## replaceGroupRoleMappings

Replaces the entire set of directory group role mappings for a directory. The position of
each item in the `mappings` array determines its precedence (the first item gets
precedence 1). Passing an empty array removes all mappings. Group role mapping must be
enabled on the directory.

### Example Usage

<!-- UsageSnippet language="php" operationID="ReplaceDirectoryGroupRoleMappings" method="put" path="/directories/{directory_id}/group_role_mappings" -->
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

$requestBody = new Operations\ReplaceDirectoryGroupRoleMappingsRequestBody(
    mappings: [
        new Operations\ReplaceDirectoryGroupRoleMappingsMappings(
            roleId: '<id>',
        ),
    ],
);

$response = $sdk->directories->replaceGroupRoleMappings(
    directoryId: '<id>',
    requestBody: $requestBody

);

if ($response->directoryGroupRoleMappingList !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                          | Type                                                                                                                               | Required                                                                                                                           | Description                                                                                                                        |
| ---------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------- |
| `directoryId`                                                                                                                      | *string*                                                                                                                           | :heavy_check_mark:                                                                                                                 | The ID of the directory.                                                                                                           |
| `requestBody`                                                                                                                      | [Operations\ReplaceDirectoryGroupRoleMappingsRequestBody](../../Models/Operations/ReplaceDirectoryGroupRoleMappingsRequestBody.md) | :heavy_check_mark:                                                                                                                 | N/A                                                                                                                                |

### Response

**[?Operations\ReplaceDirectoryGroupRoleMappingsResponse](../../Models/Operations/ReplaceDirectoryGroupRoleMappingsResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## deleteGroupRoleMapping

Deletes a single directory group role mapping. Group role mapping must be enabled on the
directory.

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteDirectoryGroupRoleMapping" method="delete" path="/directories/{directory_id}/group_role_mappings/{mapping_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->directories->deleteGroupRoleMapping(
    directoryId: '<id>',
    mappingId: '<id>'

);

if ($response->directoryGroupRoleMappingDeleted !== null) {
    // handle response
}
```

### Parameters

| Parameter                                             | Type                                                  | Required                                              | Description                                           |
| ----------------------------------------------------- | ----------------------------------------------------- | ----------------------------------------------------- | ----------------------------------------------------- |
| `directoryId`                                         | *string*                                              | :heavy_check_mark:                                    | The ID of the directory.                              |
| `mappingId`                                           | *string*                                              | :heavy_check_mark:                                    | The ID of the directory group role mapping to delete. |

### Response

**[?Operations\DeleteDirectoryGroupRoleMappingResponse](../../Models/Operations/DeleteDirectoryGroupRoleMappingResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
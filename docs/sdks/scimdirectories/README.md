# ScimDirectories

## Overview

### Available Operations

* [list](#list) - List all SCIM directories
* [create](#create) - Create a SCIM directory
* [get](#get) - Retrieve a SCIM directory
* [update](#update) - Update a SCIM directory
* [delete](#delete) - Delete a SCIM directory
* [rotateApiKey](#rotateapikey) - Rotate a SCIM directory's API key
* [listGroupRoleMappings](#listgrouprolemappings) - List SCIM group role mappings
* [createGroupRoleMapping](#creategrouprolemapping) - Create a SCIM group role mapping
* [replaceGroupRoleMappings](#replacegrouprolemappings) - Replace SCIM group role mappings
* [deleteGroupRoleMapping](#deletegrouprolemapping) - Delete a SCIM group role mapping

## list

Returns a list of all SCIM directories for the instance.

### Example Usage

<!-- UsageSnippet language="php" operationID="ListSCIMDirectories" method="get" path="/scim_directories" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->scimDirectories->list(
    limit: 10,
    offset: 0

);

if ($response->scimDirectoryList !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                 | Type                                                                                                                                      | Required                                                                                                                                  | Description                                                                                                                               |
| ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- |
| `limit`                                                                                                                                   | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Applies a limit to the number of results returned.<br/>Can be used for paginating the results together with `offset`.                     |
| `offset`                                                                                                                                  | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Skip the first `offset` results when paginating.<br/>Needs to be an integer greater or equal to zero.<br/>To be used in conjunction with `limit`. |

### Response

**[?Operations\ListSCIMDirectoriesResponse](../../Models/Operations/ListSCIMDirectoriesResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## create

Create a new SCIM directory for the instance.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateSCIMDirectory" method="post" path="/scim_directories" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->scimDirectories->create(
    request: $request
);

if ($response->scimDirectory !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                              | Type                                                                                                   | Required                                                                                               | Description                                                                                            |
| ------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                             | [Operations\CreateSCIMDirectoryRequestBody](../../Models/Operations/CreateSCIMDirectoryRequestBody.md) | :heavy_check_mark:                                                                                     | The request object to use for the request.                                                             |

### Response

**[?Operations\CreateSCIMDirectoryResponse](../../Models/Operations/CreateSCIMDirectoryResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## get

Returns the details of a SCIM directory.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetSCIMDirectory" method="get" path="/scim_directories/{scim_directory_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->scimDirectories->get(
    scimDirectoryId: '<id>'
);

if ($response->scimDirectory !== null) {
    // handle response
}
```

### Parameters

| Parameter                                | Type                                     | Required                                 | Description                              |
| ---------------------------------------- | ---------------------------------------- | ---------------------------------------- | ---------------------------------------- |
| `scimDirectoryId`                        | *string*                                 | :heavy_check_mark:                       | The ID of the SCIM directory to retrieve |

### Response

**[?Operations\GetSCIMDirectoryResponse](../../Models/Operations/GetSCIMDirectoryResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## update

Updates a SCIM directory.

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateSCIMDirectory" method="patch" path="/scim_directories/{scim_directory_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->scimDirectories->update(
    scimDirectoryId: '<id>',
    requestBody: $requestBody

);

if ($response->scimDirectory !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                               | Type                                                                                                    | Required                                                                                                | Description                                                                                             |
| ------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- |
| `scimDirectoryId`                                                                                       | *string*                                                                                                | :heavy_check_mark:                                                                                      | The ID of the SCIM directory to update                                                                  |
| `requestBody`                                                                                           | [?Operations\UpdateSCIMDirectoryRequestBody](../../Models/Operations/UpdateSCIMDirectoryRequestBody.md) | :heavy_minus_sign:                                                                                      | N/A                                                                                                     |

### Response

**[?Operations\UpdateSCIMDirectoryResponse](../../Models/Operations/UpdateSCIMDirectoryResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## delete

Deletes a SCIM directory and stops provisioning for it. SCIM requests authenticated
with the directory's API key are rejected afterwards.

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteSCIMDirectory" method="delete" path="/scim_directories/{scim_directory_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->scimDirectories->delete(
    scimDirectoryId: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                              | Type                                   | Required                               | Description                            |
| -------------------------------------- | -------------------------------------- | -------------------------------------- | -------------------------------------- |
| `scimDirectoryId`                      | *string*                               | :heavy_check_mark:                     | The ID of the SCIM directory to delete |

### Response

**[?Operations\DeleteSCIMDirectoryResponse](../../Models/Operations/DeleteSCIMDirectoryResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## rotateApiKey

Generates a new API key for the SCIM directory and returns it in the `api_key` field.
This is the only way to obtain the key after creation, so make sure to update it in
your identity provider. The previous key remains valid for a short grace period before
it expires.

### Example Usage

<!-- UsageSnippet language="php" operationID="RotateSCIMDirectoryAPIKey" method="post" path="/scim_directories/{scim_directory_id}/rotate_api_key" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->scimDirectories->rotateApiKey(
    scimDirectoryId: '<id>'
);

if ($response->scimDirectory !== null) {
    // handle response
}
```

### Parameters

| Parameter                                            | Type                                                 | Required                                             | Description                                          |
| ---------------------------------------------------- | ---------------------------------------------------- | ---------------------------------------------------- | ---------------------------------------------------- |
| `scimDirectoryId`                                    | *string*                                             | :heavy_check_mark:                                   | The ID of the SCIM directory whose API key to rotate |

### Response

**[?Operations\RotateSCIMDirectoryAPIKeyResponse](../../Models/Operations/RotateSCIMDirectoryAPIKeyResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## listGroupRoleMappings

Returns the list of SCIM group to organization role mappings for a SCIM directory, ordered by precedence.

### Example Usage

<!-- UsageSnippet language="php" operationID="ListSCIMGroupRoleMappings" method="get" path="/scim_directories/{scim_directory_id}/group_role_mappings" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->scimDirectories->listGroupRoleMappings(
    scimDirectoryId: '<id>'
);

if ($response->scimGroupRoleMappingList !== null) {
    // handle response
}
```

### Parameters

| Parameter                     | Type                          | Required                      | Description                   |
| ----------------------------- | ----------------------------- | ----------------------------- | ----------------------------- |
| `scimDirectoryId`             | *string*                      | :heavy_check_mark:            | The ID of the SCIM directory. |

### Response

**[?Operations\ListSCIMGroupRoleMappingsResponse](../../Models/Operations/ListSCIMGroupRoleMappingsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## createGroupRoleMapping

Creates a new SCIM group to organization role mapping for a SCIM directory.
Group role mapping must be enabled on the directory.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateSCIMGroupRoleMapping" method="post" path="/scim_directories/{scim_directory_id}/group_role_mappings" -->
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

$requestBody = new Operations\CreateSCIMGroupRoleMappingRequestBody(
    scimGroupId: '<id>',
    roleId: '<id>',
);

$response = $sdk->scimDirectories->createGroupRoleMapping(
    scimDirectoryId: '<id>',
    requestBody: $requestBody

);

if ($response->scimGroupRoleMapping !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                            | Type                                                                                                                 | Required                                                                                                             | Description                                                                                                          |
| -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `scimDirectoryId`                                                                                                    | *string*                                                                                                             | :heavy_check_mark:                                                                                                   | The ID of the SCIM directory.                                                                                        |
| `requestBody`                                                                                                        | [Operations\CreateSCIMGroupRoleMappingRequestBody](../../Models/Operations/CreateSCIMGroupRoleMappingRequestBody.md) | :heavy_check_mark:                                                                                                   | N/A                                                                                                                  |

### Response

**[?Operations\CreateSCIMGroupRoleMappingResponse](../../Models/Operations/CreateSCIMGroupRoleMappingResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## replaceGroupRoleMappings

Replaces the entire set of SCIM group role mappings for a directory. The position of
each item in the `mappings` array determines its precedence (the first item gets
precedence 1). Passing an empty array removes all mappings. Group role mapping must be
enabled on the directory.

### Example Usage

<!-- UsageSnippet language="php" operationID="ReplaceSCIMGroupRoleMappings" method="put" path="/scim_directories/{scim_directory_id}/group_role_mappings" -->
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

$requestBody = new Operations\ReplaceSCIMGroupRoleMappingsRequestBody(
    mappings: [],
);

$response = $sdk->scimDirectories->replaceGroupRoleMappings(
    scimDirectoryId: '<id>',
    requestBody: $requestBody

);

if ($response->scimGroupRoleMappingList !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                | Type                                                                                                                     | Required                                                                                                                 | Description                                                                                                              |
| ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ |
| `scimDirectoryId`                                                                                                        | *string*                                                                                                                 | :heavy_check_mark:                                                                                                       | The ID of the SCIM directory.                                                                                            |
| `requestBody`                                                                                                            | [Operations\ReplaceSCIMGroupRoleMappingsRequestBody](../../Models/Operations/ReplaceSCIMGroupRoleMappingsRequestBody.md) | :heavy_check_mark:                                                                                                       | N/A                                                                                                                      |

### Response

**[?Operations\ReplaceSCIMGroupRoleMappingsResponse](../../Models/Operations/ReplaceSCIMGroupRoleMappingsResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## deleteGroupRoleMapping

Deletes a single SCIM group role mapping. Group role mapping must be enabled on the
directory.

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteSCIMGroupRoleMapping" method="delete" path="/scim_directories/{scim_directory_id}/group_role_mappings/{mapping_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->scimDirectories->deleteGroupRoleMapping(
    scimDirectoryId: '<id>',
    mappingId: '<id>'

);

if ($response->scimGroupRoleMappingDeleted !== null) {
    // handle response
}
```

### Parameters

| Parameter                                        | Type                                             | Required                                         | Description                                      |
| ------------------------------------------------ | ------------------------------------------------ | ------------------------------------------------ | ------------------------------------------------ |
| `scimDirectoryId`                                | *string*                                         | :heavy_check_mark:                               | The ID of the SCIM directory.                    |
| `mappingId`                                      | *string*                                         | :heavy_check_mark:                               | The ID of the SCIM group role mapping to delete. |

### Response

**[?Operations\DeleteSCIMGroupRoleMappingResponse](../../Models/Operations/DeleteSCIMGroupRoleMappingResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
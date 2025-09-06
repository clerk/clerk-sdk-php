# Machines
(*machines*)

## Overview

### Available Operations

* [list](#list) - Get a list of machines for an instance
* [create](#create) - Create a machine
* [get](#get) - Retrieve a machine
* [update](#update) - Update a machine
* [delete](#delete) - Delete a machine
* [getSecretKey](#getsecretkey) - Retrieve a machine secret key
* [rotateSecretKey](#rotatesecretkey) - Rotate a machine's secret key
* [createScope](#createscope) - Create a machine scope
* [deleteScope](#deletescope) - Delete a machine scope

## list

This request returns the list of machines for an instance. The machines are
ordered by descending creation date (i.e. most recent machines will be
returned first)

### Example Usage

<!-- UsageSnippet language="php" operationID="ListMachines" method="get" path="/machines" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->machines->list(
    limit: 10,
    offset: 0,
    orderBy: '-created_at'

);

if ($response->machineList !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                                                                                                                                                                                                              | Type                                                                                                                                                                                                                                                                                                                                                                                   | Required                                                                                                                                                                                                                                                                                                                                                                               | Description                                                                                                                                                                                                                                                                                                                                                                            |
| -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `limit`                                                                                                                                                                                                                                                                                                                                                                                | *?int*                                                                                                                                                                                                                                                                                                                                                                                 | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                     | Applies a limit to the number of results returned.<br/>Can be used for paginating the results together with `offset`.                                                                                                                                                                                                                                                                  |
| `offset`                                                                                                                                                                                                                                                                                                                                                                               | *?int*                                                                                                                                                                                                                                                                                                                                                                                 | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                     | Skip the first `offset` results when paginating.<br/>Needs to be an integer greater or equal to zero.<br/>To be used in conjunction with `limit`.                                                                                                                                                                                                                                      |
| `query`                                                                                                                                                                                                                                                                                                                                                                                | *?string*                                                                                                                                                                                                                                                                                                                                                                              | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                     | Returns machines with ID or name that match the given query. Uses exact match for machine ID and partial match for name.                                                                                                                                                                                                                                                               |
| `orderBy`                                                                                                                                                                                                                                                                                                                                                                              | *?string*                                                                                                                                                                                                                                                                                                                                                                              | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                     | Allows to return machines in a particular order.<br/>You can order the returned machines by their `name` or `created_at`.<br/>To specify the direction, use the `+` or `-` symbols prepended to the property to order by.<br/>For example, to return machines in descending order by `created_at`, use `-created_at`.<br/>If you don't use `+` or `-`, then `+` is implied.<br/>Defaults to `-created_at`. |

### Response

**[?Operations\ListMachinesResponse](../../Models/Operations/ListMachinesResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## create

Creates a new machine.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateMachine" method="post" path="/machines" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->machines->create(
    request: $request
);

if ($response->machineCreated !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                  | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `$request`                                                                                 | [Operations\CreateMachineRequestBody](../../Models/Operations/CreateMachineRequestBody.md) | :heavy_check_mark:                                                                         | The request object to use for the request.                                                 |

### Response

**[?Operations\CreateMachineResponse](../../Models/Operations/CreateMachineResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## get

Returns the details of a machine.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetMachine" method="get" path="/machines/{machine_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->machines->get(
    machineId: '<id>'
);

if ($response->machine !== null) {
    // handle response
}
```

### Parameters

| Parameter                         | Type                              | Required                          | Description                       |
| --------------------------------- | --------------------------------- | --------------------------------- | --------------------------------- |
| `machineId`                       | *string*                          | :heavy_check_mark:                | The ID of the machine to retrieve |

### Response

**[?Operations\GetMachineResponse](../../Models/Operations/GetMachineResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## update

Updates an existing machine.
Only the provided fields will be updated.

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateMachine" method="patch" path="/machines/{machine_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->machines->update(
    machineId: '<id>',
    requestBody: $requestBody

);

if ($response->machine !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                   | Type                                                                                        | Required                                                                                    | Description                                                                                 |
| ------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------- |
| `machineId`                                                                                 | *string*                                                                                    | :heavy_check_mark:                                                                          | The ID of the machine to update                                                             |
| `requestBody`                                                                               | [?Operations\UpdateMachineRequestBody](../../Models/Operations/UpdateMachineRequestBody.md) | :heavy_minus_sign:                                                                          | N/A                                                                                         |

### Response

**[?Operations\UpdateMachineResponse](../../Models/Operations/UpdateMachineResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## delete

Deletes a machine.

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteMachine" method="delete" path="/machines/{machine_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->machines->delete(
    machineId: '<id>'
);

if ($response->machineDeleted !== null) {
    // handle response
}
```

### Parameters

| Parameter                       | Type                            | Required                        | Description                     |
| ------------------------------- | ------------------------------- | ------------------------------- | ------------------------------- |
| `machineId`                     | *string*                        | :heavy_check_mark:              | The ID of the machine to delete |

### Response

**[?Operations\DeleteMachineResponse](../../Models/Operations/DeleteMachineResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## getSecretKey

Returns the secret key for a machine.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetMachineSecretKey" method="get" path="/machines/{machine_id}/secret_key" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->machines->getSecretKey(
    machineId: '<id>'
);

if ($response->machineSecretKey !== null) {
    // handle response
}
```

### Parameters

| Parameter                                            | Type                                                 | Required                                             | Description                                          |
| ---------------------------------------------------- | ---------------------------------------------------- | ---------------------------------------------------- | ---------------------------------------------------- |
| `machineId`                                          | *string*                                             | :heavy_check_mark:                                   | The ID of the machine to retrieve the secret key for |

### Response

**[?Operations\GetMachineSecretKeyResponse](../../Models/Operations/GetMachineSecretKeyResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## rotateSecretKey

Rotates the machine's secret key.
When the secret key is rotated, make sure to update it in your machine/application.
The previous secret key will remain valid for the duration specified by the previous_token_ttl parameter.

### Example Usage

<!-- UsageSnippet language="php" operationID="RotateMachineSecretKey" method="post" path="/machines/{machine_id}/secret_key/rotate" -->
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

$requestBody = new Operations\RotateMachineSecretKeyRequestBody(
    previousTokenTtl: 632625,
);

$response = $sdk->machines->rotateSecretKey(
    machineId: '<id>',
    requestBody: $requestBody

);

if ($response->machineSecretKey !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                    | Type                                                                                                         | Required                                                                                                     | Description                                                                                                  |
| ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ |
| `machineId`                                                                                                  | *string*                                                                                                     | :heavy_check_mark:                                                                                           | The ID of the machine to rotate the secret key for                                                           |
| `requestBody`                                                                                                | [Operations\RotateMachineSecretKeyRequestBody](../../Models/Operations/RotateMachineSecretKeyRequestBody.md) | :heavy_check_mark:                                                                                           | N/A                                                                                                          |

### Response

**[?Operations\RotateMachineSecretKeyResponse](../../Models/Operations/RotateMachineSecretKeyResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## createScope

Creates a new machine scope, allowing the specified machine to access another machine.
Maximum of 25 scopes per machine.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateMachineScope" method="post" path="/machines/{machine_id}/scopes" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->machines->createScope(
    machineId: '<id>',
    requestBody: $requestBody

);

if ($response->machineScope !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                             | Type                                                                                                  | Required                                                                                              | Description                                                                                           |
| ----------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- |
| `machineId`                                                                                           | *string*                                                                                              | :heavy_check_mark:                                                                                    | The ID of the machine that will have access to another machine                                        |
| `requestBody`                                                                                         | [?Operations\CreateMachineScopeRequestBody](../../Models/Operations/CreateMachineScopeRequestBody.md) | :heavy_minus_sign:                                                                                    | N/A                                                                                                   |

### Response

**[?Operations\CreateMachineScopeResponse](../../Models/Operations/CreateMachineScopeResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\ClerkErrors           | 400, 401, 403, 404, 409, 422 | application/json             |
| Errors\SDKException          | 4XX, 5XX                     | \*/\*                        |

## deleteScope

Deletes a machine scope, removing access from one machine to another.

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteMachineScope" method="delete" path="/machines/{machine_id}/scopes/{other_machine_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->machines->deleteScope(
    machineId: '<id>',
    otherMachineId: '<id>'

);

if ($response->machineScopeDeleted !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                | Type                                                     | Required                                                 | Description                                              |
| -------------------------------------------------------- | -------------------------------------------------------- | -------------------------------------------------------- | -------------------------------------------------------- |
| `machineId`                                              | *string*                                                 | :heavy_check_mark:                                       | The ID of the machine that has access to another machine |
| `otherMachineId`                                         | *string*                                                 | :heavy_check_mark:                                       | The ID of the machine that is being accessed             |

### Response

**[?Operations\DeleteMachineScopeResponse](../../Models/Operations/DeleteMachineScopeResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |
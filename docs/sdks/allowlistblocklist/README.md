# AllowlistBlocklist
(*allowlistBlocklist*)

## Overview

### Available Operations

* [createAllowlistIdentifier](#createallowlistidentifier) - Add identifier to the allow-list
* [createBlocklistIdentifier](#createblocklistidentifier) - Add identifier to the block-list
* [deleteBlocklistIdentifier](#deleteblocklistidentifier) - Delete identifier from block-list
* [listAllowlistIdentifiers](#listallowlistidentifiers) - List all identifiers on the allow-list

## createAllowlistIdentifier

Create an identifier allowed to sign up to an instance

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

$request = new Operations\CreateAllowlistIdentifierRequestBody(
    identifier: '<value>',
);

$response = $sdk->allowlistBlocklist->createAllowlistIdentifier(
    request: $request
);

if ($response->allowlistIdentifier !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                          | Type                                                                                                               | Required                                                                                                           | Description                                                                                                        |
| ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                         | [Operations\CreateAllowlistIdentifierRequestBody](../../Models/Operations/CreateAllowlistIdentifierRequestBody.md) | :heavy_check_mark:                                                                                                 | The request object to use for the request.                                                                         |

### Response

**[?Operations\CreateAllowlistIdentifierResponse](../../Models/Operations/CreateAllowlistIdentifierResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 402, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## createBlocklistIdentifier

Create an identifier that is blocked from accessing an instance

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

$request = new Operations\CreateBlocklistIdentifierRequestBody(
    identifier: '<value>',
);

$response = $sdk->allowlistBlocklist->createBlocklistIdentifier(
    request: $request
);

if ($response->blocklistIdentifier !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                          | Type                                                                                                               | Required                                                                                                           | Description                                                                                                        |
| ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                         | [Operations\CreateBlocklistIdentifierRequestBody](../../Models/Operations/CreateBlocklistIdentifierRequestBody.md) | :heavy_check_mark:                                                                                                 | The request object to use for the request.                                                                         |

### Response

**[?Operations\CreateBlocklistIdentifierResponse](../../Models/Operations/CreateBlocklistIdentifierResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 402, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## deleteBlocklistIdentifier

Delete an identifier from the instance block-list

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



$response = $sdk->allowlistBlocklist->deleteBlocklistIdentifier(
    identifierId: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                                              | Type                                                   | Required                                               | Description                                            |
| ------------------------------------------------------ | ------------------------------------------------------ | ------------------------------------------------------ | ------------------------------------------------------ |
| `identifierId`                                         | *string*                                               | :heavy_check_mark:                                     | The ID of the identifier to delete from the block-list |

### Response

**[?Operations\DeleteBlocklistIdentifierResponse](../../Models/Operations/DeleteBlocklistIdentifierResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 402, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## listAllowlistIdentifiers

Get a list of all identifiers allowed to sign up to an instance

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



$response = $sdk->allowlistBlocklist->listAllowlistIdentifiers(

);

if ($response->allowlistIdentifierList !== null) {
    // handle response
}
```

### Response

**[?Operations\ListAllowlistIdentifiersResponse](../../Models/Operations/ListAllowlistIdentifiersResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 402            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
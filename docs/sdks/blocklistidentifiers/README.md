# BlocklistIdentifiers
(*blocklistIdentifiers*)

## Overview

### Available Operations

* [create](#create) - Add identifier to the block-list
* [delete](#delete) - Delete identifier from block-list
* [list](#list) - List all identifiers on the block-list

## create

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

$response = $sdk->blocklistIdentifiers->create(
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

## delete

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



$response = $sdk->blocklistIdentifiers->delete(
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

## list

Get a list of all identifiers which are not allowed to access an instance

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



$response = $sdk->blocklistIdentifiers->list(

);

if ($response->blocklistIdentifiers !== null) {
    // handle response
}
```

### Response

**[?Operations\ListBlocklistIdentifiersResponse](../../Models/Operations/ListBlocklistIdentifiersResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 402            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
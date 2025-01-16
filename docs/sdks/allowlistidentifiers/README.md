# AllowlistIdentifiers
(*allowlistIdentifiers*)

## Overview

### Available Operations

* [delete](#delete) - Delete identifier from allow-list

## delete

Delete an identifier from the instance allow-list

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



$response = $sdk->allowlistIdentifiers->delete(
    identifierId: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                                              | Type                                                   | Required                                               | Description                                            |
| ------------------------------------------------------ | ------------------------------------------------------ | ------------------------------------------------------ | ------------------------------------------------------ |
| `identifierId`                                         | *string*                                               | :heavy_check_mark:                                     | The ID of the identifier to delete from the allow-list |

### Response

**[?Operations\DeleteAllowlistIdentifierResponse](../../Models/Operations/DeleteAllowlistIdentifierResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 402, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
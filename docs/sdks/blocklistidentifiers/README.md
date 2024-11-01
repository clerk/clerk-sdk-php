# BlocklistIdentifiers
(*blocklistIdentifiers*)

## Overview

### Available Operations

* [list](#list) - List all identifiers on the block-list

## list

Get a list of all identifiers which are not allowed to access an instance

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



$response = $sdk->blocklistIdentifiers->list(

);

if ($response->blocklistIdentifiers !== null) {
    // handle response
}
```

### Response

**[?Operations\ListBlocklistIdentifiersResponse](../../Models/Operations/ListBlocklistIdentifiersResponse.md)**

### Errors

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors48 | 401, 402             | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |
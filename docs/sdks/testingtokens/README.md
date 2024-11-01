# TestingTokens
(*testingTokens*)

## Overview

### Available Operations

* [create](#create) - Retrieve a new testing token

## create

Retrieve a new testing token. Only available for development instances.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



$response = $sdk->testingTokens->create(

);

if ($response->testingToken !== null) {
    // handle response
}
```

### Response

**[?Operations\CreateTestingTokenResponse](../../Models/Operations/CreateTestingTokenResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
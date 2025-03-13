# Jwks
(*jwks*)

## Overview

### Available Operations

* [getJWKS](#getjwks) - Retrieve the JSON Web Key Set of the instance

## getJWKS

Retrieve the JSON Web Key Set of the instance

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



$response = $sdk->jwks->getJWKS(

);

if ($response->jwks !== null) {
    // handle response
}
```

### Response

**[?Operations\GetJWKSResponse](../../Models/Operations/GetJWKSResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
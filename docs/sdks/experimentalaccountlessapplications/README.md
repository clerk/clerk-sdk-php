# ExperimentalAccountlessApplications
(*experimentalAccountlessApplications*)

## Overview

### Available Operations

* [create](#create) - Create an accountless application [EXPERIMENTAL]
* [complete](#complete) - Complete an accountless application [EXPERIMENTAL]

## create

Creates a new accountless application. [EXPERIMENTAL]

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



$response = $sdk->experimentalAccountlessApplications->create(

);

if ($response->accountlessApplication !== null) {
    // handle response
}
```

### Response

**[?Operations\CreateAccountlessApplicationResponse](../../Models/Operations/CreateAccountlessApplicationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 500                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## complete

Completes an accountless application. [EXPERIMENTAL]

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



$response = $sdk->experimentalAccountlessApplications->complete(

);

if ($response->accountlessApplication !== null) {
    // handle response
}
```

### Response

**[?Operations\CompleteAccountlessApplicationResponse](../../Models/Operations/CompleteAccountlessApplicationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 500                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
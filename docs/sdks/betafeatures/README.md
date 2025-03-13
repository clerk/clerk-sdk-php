# BetaFeatures
(*betaFeatures*)

## Overview

### Available Operations

* [updateInstanceSettings](#updateinstancesettings) - Update instance settings
* [~~updateProductionInstanceDomain~~](#updateproductioninstancedomain) - Update production instance domain :warning: **Deprecated**

## updateInstanceSettings

Updates the settings of an instance

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

$request = new Operations\UpdateInstanceAuthConfigRequestBody();

$response = $sdk->betaFeatures->updateInstanceSettings(
    request: $request
);

if ($response->instanceSettings !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                        | Type                                                                                                             | Required                                                                                                         | Description                                                                                                      |
| ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                       | [Operations\UpdateInstanceAuthConfigRequestBody](../../Models/Operations/UpdateInstanceAuthConfigRequestBody.md) | :heavy_check_mark:                                                                                               | The request object to use for the request.                                                                       |

### Response

**[?Operations\UpdateInstanceAuthConfigResponse](../../Models/Operations/UpdateInstanceAuthConfigResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 402, 422            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## ~~updateProductionInstanceDomain~~

Change the domain of a production instance.

Changing the domain requires updating the [DNS records](https://clerk.com/docs/deployments/overview#dns-records) accordingly, deploying new [SSL certificates](https://clerk.com/docs/deployments/overview#deploy), updating your Social Connection's redirect URLs and setting the new keys in your code.

WARNING: Changing your domain will invalidate all current user sessions (i.e. users will be logged out). Also, while your application is being deployed, a small downtime is expected to occur.

> :warning: **DEPRECATED**: This will be removed in a future release, please migrate away from it as soon as possible.

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

$request = new Operations\UpdateProductionInstanceDomainRequestBody();

$response = $sdk->betaFeatures->updateProductionInstanceDomain(
    request: $request
);

if ($response->statusCode === 200) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                    | Type                                                                                                                         | Required                                                                                                                     | Description                                                                                                                  |
| ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                                   | [Operations\UpdateProductionInstanceDomainRequestBody](../../Models/Operations/UpdateProductionInstanceDomainRequestBody.md) | :heavy_check_mark:                                                                                                           | The request object to use for the request.                                                                                   |

### Response

**[?Operations\UpdateProductionInstanceDomainResponse](../../Models/Operations/UpdateProductionInstanceDomainResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 422            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
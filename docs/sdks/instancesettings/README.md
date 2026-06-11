# InstanceSettings

## Overview

Modify the settings of your instance.

### Available Operations

* [get](#get) - Fetch the current instance
* [update](#update) - Update instance settings
* [updateRestrictions](#updaterestrictions) - Update instance restrictions
* [getCommunication](#getcommunication) - Get instance communication settings
* [updateCommunication](#updatecommunication) - Update instance communication settings
* [getOAuthApplicationSettings](#getoauthapplicationsettings) - Get OAuth application settings
* [updateOAuthApplicationSettings](#updateoauthapplicationsettings) - Update OAuth application settings
* [changeDomain](#changedomain) - Update production instance domain
* [getOrganizationSettings](#getorganizationsettings) - Get instance organization settings
* [updateOrganizationSettings](#updateorganizationsettings) - Update instance organization settings
* [getInstanceProtect](#getinstanceprotect) - Get instance protect settings
* [updateInstanceProtect](#updateinstanceprotect) - Update instance protect settings

## get

Fetches the current instance

### Example Usage

<!-- UsageSnippet language="php" operationID="GetInstance" method="get" path="/instance" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->instanceSettings->get(

);

if ($response->instance !== null) {
    // handle response
}
```

### Response

**[?Operations\GetInstanceResponse](../../Models/Operations/GetInstanceResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## update

Updates the settings of an instance

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateInstance" method="patch" path="/instance" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->instanceSettings->update(
    request: $request
);

if ($response->statusCode === 200) {
    // handle response
}
```

### Parameters

| Parameter                                                                                    | Type                                                                                         | Required                                                                                     | Description                                                                                  |
| -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- |
| `$request`                                                                                   | [Operations\UpdateInstanceRequestBody](../../Models/Operations/UpdateInstanceRequestBody.md) | :heavy_check_mark:                                                                           | The request object to use for the request.                                                   |

### Response

**[?Operations\UpdateInstanceResponse](../../Models/Operations/UpdateInstanceResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 422                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## updateRestrictions

Updates the restriction settings of an instance

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateInstanceRestrictions" method="patch" path="/instance/restrictions" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->instanceSettings->updateRestrictions(
    request: $request
);

if ($response->instanceRestrictions !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                            | Type                                                                                                                 | Required                                                                                                             | Description                                                                                                          |
| -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                           | [Operations\UpdateInstanceRestrictionsRequestBody](../../Models/Operations/UpdateInstanceRestrictionsRequestBody.md) | :heavy_check_mark:                                                                                                   | The request object to use for the request.                                                                           |

### Response

**[?Operations\UpdateInstanceRestrictionsResponse](../../Models/Operations/UpdateInstanceRestrictionsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 402, 422            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## getCommunication

Retrieves the per-instance SMS communication settings, including the SMS country blocklist.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetInstanceCommunication" method="get" path="/instance/communication" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->instanceSettings->getCommunication(

);

if ($response->instanceCommunication !== null) {
    // handle response
}
```

### Response

**[?Operations\GetInstanceCommunicationResponse](../../Models/Operations/GetInstanceCommunicationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## updateCommunication

Replaces the SMS country blocklist for this instance. Pass the full set of ISO 3166-1
alpha-2 country codes that should be blocked; codes that aren't recognized as SMS-tier
countries are silently dropped from the persisted list. Omitting `blocked_country_codes`
is a no-op.


### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateInstanceCommunication" method="patch" path="/instance/communication" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->instanceSettings->updateCommunication(
    request: $request
);

if ($response->instanceCommunication !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                              | Type                                                                                                                   | Required                                                                                                               | Description                                                                                                            |
| ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                             | [Operations\UpdateInstanceCommunicationRequestBody](../../Models/Operations/UpdateInstanceCommunicationRequestBody.md) | :heavy_check_mark:                                                                                                     | The request object to use for the request.                                                                             |

### Response

**[?Operations\UpdateInstanceCommunicationResponse](../../Models/Operations/UpdateInstanceCommunicationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 422                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## getOAuthApplicationSettings

Retrieves the settings for OAuth applications for the instance (dynamic client registration, JWT access tokens, etc.).

### Example Usage

<!-- UsageSnippet language="php" operationID="GetInstanceOAuthApplicationSettings" method="get" path="/instance/oauth_application_settings" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->instanceSettings->getOAuthApplicationSettings(

);

if ($response->oAuthApplicationSettings !== null) {
    // handle response
}
```

### Response

**[?Operations\GetInstanceOAuthApplicationSettingsResponse](../../Models/Operations/GetInstanceOAuthApplicationSettingsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## updateOAuthApplicationSettings

Updates the OAuth application settings for the instance.

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateInstanceOAuthApplicationSettings" method="patch" path="/instance/oauth_application_settings" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->instanceSettings->updateOAuthApplicationSettings(
    request: $request
);

if ($response->oAuthApplicationSettings !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                    | Type                                                                                                                                         | Required                                                                                                                                     | Description                                                                                                                                  |
| -------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                                                   | [Operations\UpdateInstanceOAuthApplicationSettingsRequestBody](../../Models/Operations/UpdateInstanceOAuthApplicationSettingsRequestBody.md) | :heavy_check_mark:                                                                                                                           | The request object to use for the request.                                                                                                   |

### Response

**[?Operations\UpdateInstanceOAuthApplicationSettingsResponse](../../Models/Operations/UpdateInstanceOAuthApplicationSettingsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 422                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## changeDomain

Change the domain of a production instance.

Changing the domain requires updating the [DNS records](https://clerk.com/docs/deployments/overview#dns-records) accordingly, deploying new [SSL certificates](https://clerk.com/docs/deployments/overview#deploy-certificates), updating your Social Connection's redirect URLs and setting the new keys in your code.

WARNING: Changing your domain will invalidate all current user sessions (i.e. users will be logged out). Also, while your application is being deployed, a small downtime is expected to occur.

### Example Usage

<!-- UsageSnippet language="php" operationID="ChangeProductionInstanceDomain" method="post" path="/instance/change_domain" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->instanceSettings->changeDomain(
    request: $request
);

if ($response->statusCode === 200) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                    | Type                                                                                                                         | Required                                                                                                                     | Description                                                                                                                  |
| ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                                   | [Operations\ChangeProductionInstanceDomainRequestBody](../../Models/Operations/ChangeProductionInstanceDomainRequestBody.md) | :heavy_check_mark:                                                                                                           | The request object to use for the request.                                                                                   |

### Response

**[?Operations\ChangeProductionInstanceDomainResponse](../../Models/Operations/ChangeProductionInstanceDomainResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 422            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## getOrganizationSettings

Retrieves the organization settings of the instance

### Example Usage

<!-- UsageSnippet language="php" operationID="GetInstanceOrganizationSettings" method="get" path="/instance/organization_settings" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->instanceSettings->getOrganizationSettings(

);

if ($response->organizationSettings !== null) {
    // handle response
}
```

### Response

**[?Operations\GetInstanceOrganizationSettingsResponse](../../Models/Operations/GetInstanceOrganizationSettingsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 402, 404, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## updateOrganizationSettings

Updates the organization settings of the instance

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateInstanceOrganizationSettings" method="patch" path="/instance/organization_settings" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->instanceSettings->updateOrganizationSettings(
    request: $request
);

if ($response->organizationSettings !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                            | Type                                                                                                                                 | Required                                                                                                                             | Description                                                                                                                          |
| ------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                                           | [Operations\UpdateInstanceOrganizationSettingsRequestBody](../../Models/Operations/UpdateInstanceOrganizationSettingsRequestBody.md) | :heavy_check_mark:                                                                                                                   | The request object to use for the request.                                                                                           |

### Response

**[?Operations\UpdateInstanceOrganizationSettingsResponse](../../Models/Operations/UpdateInstanceOrganizationSettingsResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 402, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## getInstanceProtect

Get instance protect settings

### Example Usage

<!-- UsageSnippet language="php" operationID="GetInstanceProtect" method="get" path="/instance/protect" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->instanceSettings->getInstanceProtect(

);

if ($response->instanceProtect !== null) {
    // handle response
}
```

### Response

**[?Operations\GetInstanceProtectResponse](../../Models/Operations/GetInstanceProtectResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## updateInstanceProtect

Update instance protect settings

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateInstanceProtect" method="patch" path="/instance/protect" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->instanceSettings->updateInstanceProtect(
    request: $request
);

if ($response->instanceProtect !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                  | Type                                                                                                       | Required                                                                                                   | Description                                                                                                |
| ---------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                 | [Operations\UpdateInstanceProtectRequestBody](../../Models/Operations/UpdateInstanceProtectRequestBody.md) | :heavy_check_mark:                                                                                         | The request object to use for the request.                                                                 |

### Response

**[?Operations\UpdateInstanceProtectResponse](../../Models/Operations/UpdateInstanceProtectResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 422                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
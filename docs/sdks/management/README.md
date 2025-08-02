# Management
(*management*)

## Overview

### Available Operations

* [upsertUser](#upsertuser) - Upsert a user
* [createOrganization](#createorganization) - Create an organization
* [createApplication](#createapplication) - Create an application (instance)
* [deleteOrganization](#deleteorganization) - Delete an organization
* [getApplication](#getapplication) - Get an application
* [updateApplication](#updateapplication) - Update an application
* [deleteApplication](#deleteapplication) - Delete an application
* [getApplicationUsage](#getapplicationusage) - Get application usage
* [updateApplicationDomain](#updateapplicationdomain) - Update application domain
* [getApplicationDomain](#getapplicationdomain) - Get application domain
* [getApplicationDomainStatus](#getapplicationdomainstatus) - Get application domain status

## upsertUser

Upsert a user using the provided information. If a user with the same email_address exists, it will be updated. Otherwise, a new user will be created.
This endpoint is internal and requires a specific management token for authorization.


### Example Usage

<!-- UsageSnippet language="php" operationID="ManagementUpsertUser" method="post" path="/management/users" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Components;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()->build();

$request = new Components\ManagementUpsertUserRequest(
    emailAddress: 'Roger_OReilly-Dibbert10@hotmail.com',
    firstName: 'Diana',
    lastName: 'Schmidt-Kutch',
);
$requestSecurity = new Operations\ManagementUpsertUserSecurity(
    managementToken: '<YOUR_BEARER_TOKEN_HERE>',
);

$response = $sdk->management->upsertUser(
    request: $request,
    security: $requestSecurity
);

if ($response->user !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                          | Type                                                                                               | Required                                                                                           | Description                                                                                        |
| -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- |
| `$request`                                                                                         | [Components\ManagementUpsertUserRequest](../../Models/Components/ManagementUpsertUserRequest.md)   | :heavy_check_mark:                                                                                 | The request object to use for the request.                                                         |
| `security`                                                                                         | [Operations\ManagementUpsertUserSecurity](../../Models/Operations/ManagementUpsertUserSecurity.md) | :heavy_check_mark:                                                                                 | The security requirements to use for the request.                                                  |

### Response

**[?Operations\ManagementUpsertUserResponse](../../Models/Operations/ManagementUpsertUserResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## createOrganization

Create a new organization.
This endpoint is internal and requires a specific management token for authorization.


### Example Usage

<!-- UsageSnippet language="php" operationID="ManagementCreateOrganization" method="post" path="/management/organizations" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Components;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()->build();

$request = new Components\ManagementCreateOrganizationRequest(
    slug: '<value>',
);
$requestSecurity = new Operations\ManagementCreateOrganizationSecurity(
    managementToken: '<YOUR_BEARER_TOKEN_HERE>',
);

$response = $sdk->management->createOrganization(
    request: $request,
    security: $requestSecurity
);

if ($response->organization !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                          | Type                                                                                                               | Required                                                                                                           | Description                                                                                                        |
| ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                         | [Components\ManagementCreateOrganizationRequest](../../Models/Components/ManagementCreateOrganizationRequest.md)   | :heavy_check_mark:                                                                                                 | The request object to use for the request.                                                                         |
| `security`                                                                                                         | [Operations\ManagementCreateOrganizationSecurity](../../Models/Operations/ManagementCreateOrganizationSecurity.md) | :heavy_check_mark:                                                                                                 | The security requirements to use for the request.                                                                  |

### Response

**[?Operations\ManagementCreateOrganizationResponse](../../Models/Operations/ManagementCreateOrganizationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## createApplication

Create a new application (instance).
This endpoint is internal and requires a specific management token for authorization.


### Example Usage

<!-- UsageSnippet language="php" operationID="ManagementCreateApplication" method="post" path="/management/applications" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Components;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()->build();

$request = new Components\ManagementCreateApplicationRequest(
    name: '<value>',
    ownerId: '<id>',
    planId: '<id>',
);
$requestSecurity = new Operations\ManagementCreateApplicationSecurity(
    managementToken: '<YOUR_BEARER_TOKEN_HERE>',
);

$response = $sdk->management->createApplication(
    request: $request,
    security: $requestSecurity
);

if ($response->managementApplicationResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                        | Type                                                                                                             | Required                                                                                                         | Description                                                                                                      |
| ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                       | [Components\ManagementCreateApplicationRequest](../../Models/Components/ManagementCreateApplicationRequest.md)   | :heavy_check_mark:                                                                                               | The request object to use for the request.                                                                       |
| `security`                                                                                                       | [Operations\ManagementCreateApplicationSecurity](../../Models/Operations/ManagementCreateApplicationSecurity.md) | :heavy_check_mark:                                                                                               | The security requirements to use for the request.                                                                |

### Response

**[?Operations\ManagementCreateApplicationResponse](../../Models/Operations/ManagementCreateApplicationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## deleteOrganization

Delete an organization.
This endpoint is internal and requires a specific management token for authorization.


### Example Usage

<!-- UsageSnippet language="php" operationID="ManagementDeleteOrganization" method="delete" path="/management/organizations/{organizationID}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()->build();


$requestSecurity = new Operations\ManagementDeleteOrganizationSecurity(
    managementToken: '<YOUR_BEARER_TOKEN_HERE>',
);

$response = $sdk->management->deleteOrganization(
    security: $requestSecurity,
    organizationID: '<id>'

);

if ($response->managementDeletedObjectResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                          | Type                                                                                                               | Required                                                                                                           | Description                                                                                                        |
| ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ |
| `security`                                                                                                         | [Operations\ManagementDeleteOrganizationSecurity](../../Models/Operations/ManagementDeleteOrganizationSecurity.md) | :heavy_check_mark:                                                                                                 | The security requirements to use for the request.                                                                  |
| `organizationID`                                                                                                   | *string*                                                                                                           | :heavy_check_mark:                                                                                                 | Organization ID.                                                                                                   |

### Response

**[?Operations\ManagementDeleteOrganizationResponse](../../Models/Operations/ManagementDeleteOrganizationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## getApplication

Get application details.
This endpoint is internal and requires a specific management token for authorization.


### Example Usage

<!-- UsageSnippet language="php" operationID="ManagementGetApplication" method="get" path="/management/applications/{applicationID}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()->build();


$requestSecurity = new Operations\ManagementGetApplicationSecurity(
    managementToken: '<YOUR_BEARER_TOKEN_HERE>',
);

$response = $sdk->management->getApplication(
    security: $requestSecurity,
    applicationID: '<id>',
    ownerId: '<id>',
    includeSecretKeys: false

);

if ($response->managementApplicationResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                               | Type                                                                                                                    | Required                                                                                                                | Description                                                                                                             |
| ----------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                              | [Operations\ManagementGetApplicationSecurity](../../Models/Operations/ManagementGetApplicationSecurity.md)              | :heavy_check_mark:                                                                                                      | The security requirements to use for the request.                                                                       |
| `applicationID`                                                                                                         | *string*                                                                                                                | :heavy_check_mark:                                                                                                      | Application ID.                                                                                                         |
| `ownerId`                                                                                                               | *string*                                                                                                                | :heavy_check_mark:                                                                                                      | Owner ID of the application (organization ID).                                                                          |
| `includeSecretKeys`                                                                                                     | *?bool*                                                                                                                 | :heavy_minus_sign:                                                                                                      | Whether to include secret keys in the response. If 'true', the response will include the secret keys for each instance. |

### Response

**[?Operations\ManagementGetApplicationResponse](../../Models/Operations/ManagementGetApplicationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## updateApplication

Update an application.
This endpoint is internal and requires a specific management token for authorization.


### Example Usage

<!-- UsageSnippet language="php" operationID="ManagementUpdateApplication" method="patch" path="/management/applications/{applicationID}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Components;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()->build();

$managementUpdateApplicationRequest = new Components\ManagementUpdateApplicationRequest();
$requestSecurity = new Operations\ManagementUpdateApplicationSecurity(
    managementToken: '<YOUR_BEARER_TOKEN_HERE>',
);

$response = $sdk->management->updateApplication(
    security: $requestSecurity,
    applicationID: '<id>',
    ownerId: '<id>',
    managementUpdateApplicationRequest: $managementUpdateApplicationRequest

);

if ($response->managementApplicationResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                        | Type                                                                                                             | Required                                                                                                         | Description                                                                                                      |
| ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                       | [Operations\ManagementUpdateApplicationSecurity](../../Models/Operations/ManagementUpdateApplicationSecurity.md) | :heavy_check_mark:                                                                                               | The security requirements to use for the request.                                                                |
| `applicationID`                                                                                                  | *string*                                                                                                         | :heavy_check_mark:                                                                                               | Application ID.                                                                                                  |
| `ownerId`                                                                                                        | *string*                                                                                                         | :heavy_check_mark:                                                                                               | Owner ID of the application (organization ID).                                                                   |
| `managementUpdateApplicationRequest`                                                                             | [Components\ManagementUpdateApplicationRequest](../../Models/Components/ManagementUpdateApplicationRequest.md)   | :heavy_check_mark:                                                                                               | Application data to update.                                                                                      |

### Response

**[?Operations\ManagementUpdateApplicationResponse](../../Models/Operations/ManagementUpdateApplicationResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## deleteApplication

Delete an application.
This endpoint is internal and requires a specific management token for authorization.


### Example Usage

<!-- UsageSnippet language="php" operationID="ManagementDeleteApplication" method="delete" path="/management/applications/{applicationID}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()->build();


$requestSecurity = new Operations\ManagementDeleteApplicationSecurity(
    managementToken: '<YOUR_BEARER_TOKEN_HERE>',
);

$response = $sdk->management->deleteApplication(
    security: $requestSecurity,
    applicationID: '<id>',
    ownerId: '<id>'

);

if ($response->managementDeletedObjectResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                        | Type                                                                                                             | Required                                                                                                         | Description                                                                                                      |
| ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                       | [Operations\ManagementDeleteApplicationSecurity](../../Models/Operations/ManagementDeleteApplicationSecurity.md) | :heavy_check_mark:                                                                                               | The security requirements to use for the request.                                                                |
| `applicationID`                                                                                                  | *string*                                                                                                         | :heavy_check_mark:                                                                                               | Application ID.                                                                                                  |
| `ownerId`                                                                                                        | *string*                                                                                                         | :heavy_check_mark:                                                                                               | Owner ID of the application (organization ID).                                                                   |

### Response

**[?Operations\ManagementDeleteApplicationResponse](../../Models/Operations/ManagementDeleteApplicationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## getApplicationUsage

Get usage report for an application.
This endpoint is internal and requires a specific management token for authorization.


### Example Usage

<!-- UsageSnippet language="php" operationID="ManagementGetApplicationUsage" method="get" path="/management/applications/{applicationID}/usage" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()->build();


$requestSecurity = new Operations\ManagementGetApplicationUsageSecurity(
    managementToken: '<YOUR_BEARER_TOKEN_HERE>',
);

$response = $sdk->management->getApplicationUsage(
    security: $requestSecurity,
    applicationID: '<id>',
    ownerId: '<id>'

);

if ($response->managementUsageReportResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                            | Type                                                                                                                 | Required                                                                                                             | Description                                                                                                          |
| -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                           | [Operations\ManagementGetApplicationUsageSecurity](../../Models/Operations/ManagementGetApplicationUsageSecurity.md) | :heavy_check_mark:                                                                                                   | The security requirements to use for the request.                                                                    |
| `applicationID`                                                                                                      | *string*                                                                                                             | :heavy_check_mark:                                                                                                   | Application ID.                                                                                                      |
| `ownerId`                                                                                                            | *string*                                                                                                             | :heavy_check_mark:                                                                                                   | Owner ID of the application (organization ID).                                                                       |

### Response

**[?Operations\ManagementGetApplicationUsageResponse](../../Models/Operations/ManagementGetApplicationUsageResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## updateApplicationDomain

Update the domain for an application.
This endpoint is internal and requires a specific management token for authorization.


### Example Usage

<!-- UsageSnippet language="php" operationID="ManagementUpdateApplicationDomain" method="patch" path="/management/applications/{applicationID}/domain" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Components;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()->build();

$managementUpdateApplicationDomainRequest = new Components\ManagementUpdateApplicationDomainRequest(
    name: '<value>',
);
$requestSecurity = new Operations\ManagementUpdateApplicationDomainSecurity(
    managementToken: '<YOUR_BEARER_TOKEN_HERE>',
);

$response = $sdk->management->updateApplicationDomain(
    security: $requestSecurity,
    applicationID: '<id>',
    ownerId: '<id>',
    managementUpdateApplicationDomainRequest: $managementUpdateApplicationDomainRequest

);

if ($response->managementDomainResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                    | Type                                                                                                                         | Required                                                                                                                     | Description                                                                                                                  |
| ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                   | [Operations\ManagementUpdateApplicationDomainSecurity](../../Models/Operations/ManagementUpdateApplicationDomainSecurity.md) | :heavy_check_mark:                                                                                                           | The security requirements to use for the request.                                                                            |
| `applicationID`                                                                                                              | *string*                                                                                                                     | :heavy_check_mark:                                                                                                           | Application ID.                                                                                                              |
| `ownerId`                                                                                                                    | *string*                                                                                                                     | :heavy_check_mark:                                                                                                           | Owner ID of the application (organization ID).                                                                               |
| `managementUpdateApplicationDomainRequest`                                                                                   | [Components\ManagementUpdateApplicationDomainRequest](../../Models/Components/ManagementUpdateApplicationDomainRequest.md)   | :heavy_check_mark:                                                                                                           | Domain data to update.                                                                                                       |

### Response

**[?Operations\ManagementUpdateApplicationDomainResponse](../../Models/Operations/ManagementUpdateApplicationDomainResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## getApplicationDomain

Get domain information for an application.
This endpoint is internal and requires a specific management token for authorization.


### Example Usage

<!-- UsageSnippet language="php" operationID="ManagementGetApplicationDomain" method="get" path="/management/applications/{applicationID}/domains/{domainName}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()->build();


$requestSecurity = new Operations\ManagementGetApplicationDomainSecurity(
    managementToken: '<YOUR_BEARER_TOKEN_HERE>',
);

$response = $sdk->management->getApplicationDomain(
    security: $requestSecurity,
    applicationID: '<id>',
    domainName: 'elderly-disk.name',
    ownerId: '<id>'

);

if ($response->managementDomainResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                              | Type                                                                                                                   | Required                                                                                                               | Description                                                                                                            |
| ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                             | [Operations\ManagementGetApplicationDomainSecurity](../../Models/Operations/ManagementGetApplicationDomainSecurity.md) | :heavy_check_mark:                                                                                                     | The security requirements to use for the request.                                                                      |
| `applicationID`                                                                                                        | *string*                                                                                                               | :heavy_check_mark:                                                                                                     | Application ID.                                                                                                        |
| `domainName`                                                                                                           | *string*                                                                                                               | :heavy_check_mark:                                                                                                     | Domain name.                                                                                                           |
| `ownerId`                                                                                                              | *string*                                                                                                               | :heavy_check_mark:                                                                                                     | Owner ID of the application (organization ID).                                                                         |

### Response

**[?Operations\ManagementGetApplicationDomainResponse](../../Models/Operations/ManagementGetApplicationDomainResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## getApplicationDomainStatus

Get the status of a domain for an application.
This endpoint is internal and requires a specific management token for authorization.


### Example Usage

<!-- UsageSnippet language="php" operationID="ManagementGetApplicationDomainStatus" method="get" path="/management/applications/{applicationID}/domains/{domainName}/status" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()->build();


$requestSecurity = new Operations\ManagementGetApplicationDomainStatusSecurity(
    managementToken: '<YOUR_BEARER_TOKEN_HERE>',
);

$response = $sdk->management->getApplicationDomainStatus(
    security: $requestSecurity,
    applicationID: '<id>',
    domainName: 'fatal-arcade.org',
    ownerId: '<id>'

);

if ($response->managementDomainStatusResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                          | Type                                                                                                                               | Required                                                                                                                           | Description                                                                                                                        |
| ---------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                         | [Operations\ManagementGetApplicationDomainStatusSecurity](../../Models/Operations/ManagementGetApplicationDomainStatusSecurity.md) | :heavy_check_mark:                                                                                                                 | The security requirements to use for the request.                                                                                  |
| `applicationID`                                                                                                                    | *string*                                                                                                                           | :heavy_check_mark:                                                                                                                 | Application ID.                                                                                                                    |
| `domainName`                                                                                                                       | *string*                                                                                                                           | :heavy_check_mark:                                                                                                                 | Domain name.                                                                                                                       |
| `ownerId`                                                                                                                          | *string*                                                                                                                           | :heavy_check_mark:                                                                                                                 | Owner ID of the application (organization ID).                                                                                     |

### Response

**[?Operations\ManagementGetApplicationDomainStatusResponse](../../Models/Operations/ManagementGetApplicationDomainStatusResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
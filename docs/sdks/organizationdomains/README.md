# OrganizationDomains
(*organizationDomains*)

## Overview

### Available Operations

* [create](#create) - Create a new organization domain.
* [delete](#delete) - Remove a domain from an organization.
* [list](#list) - Get a list of all domains of an organization.

## create

Creates a new organization domain. By default the domain is verified, but can be optionally set to unverified.

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

$requestBody = new Operations\CreateOrganizationDomainRequestBody();

$response = $sdk->organizationDomains->create(
    organizationId: '<id>',
    requestBody: $requestBody

);

if ($response->organizationDomain !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                        | Type                                                                                                             | Required                                                                                                         | Description                                                                                                      |
| ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- |
| `organizationId`                                                                                                 | *string*                                                                                                         | :heavy_check_mark:                                                                                               | The ID of the organization where the new domain will be created.                                                 |
| `requestBody`                                                                                                    | [Operations\CreateOrganizationDomainRequestBody](../../Models/Operations/CreateOrganizationDomainRequestBody.md) | :heavy_check_mark:                                                                                               | N/A                                                                                                              |

### Response

**[?Operations\CreateOrganizationDomainResponse](../../Models/Operations/CreateOrganizationDomainResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 403, 404, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## delete

Removes the given domain from the organization.

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



$response = $sdk->organizationDomains->delete(
    organizationId: '<id>',
    domainId: '<id>'

);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                                        | Type                                             | Required                                         | Description                                      |
| ------------------------------------------------ | ------------------------------------------------ | ------------------------------------------------ | ------------------------------------------------ |
| `organizationId`                                 | *string*                                         | :heavy_check_mark:                               | The ID of the organization the domain belongs to |
| `domainId`                                       | *string*                                         | :heavy_check_mark:                               | The ID of the domain                             |

### Response

**[?Operations\DeleteOrganizationDomainResponse](../../Models/Operations/DeleteOrganizationDomainResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## list

Get a list of all domains of an organization.

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

$request = new Operations\ListOrganizationDomainsRequest(
    organizationId: '<id>',
);

$response = $sdk->organizationDomains->list(
    request: $request
);

if ($response->organizationDomains !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                              | Type                                                                                                   | Required                                                                                               | Description                                                                                            |
| ------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                             | [Operations\ListOrganizationDomainsRequest](../../Models/Operations/ListOrganizationDomainsRequest.md) | :heavy_check_mark:                                                                                     | The request object to use for the request.                                                             |

### Response

**[?Operations\ListOrganizationDomainsResponse](../../Models/Operations/ListOrganizationDomainsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 422            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
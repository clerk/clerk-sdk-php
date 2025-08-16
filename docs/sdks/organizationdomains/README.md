# OrganizationDomains
(*organizationDomains*)

## Overview

### Available Operations

* [create](#create) - Create a new organization domain.
* [list](#list) - Get a list of all domains of an organization.
* [update](#update) - Update an organization domain.
* [delete](#delete) - Remove a domain from an organization.
* [listAll](#listall) - List all organization domains

## create

Creates a new organization domain. By default the domain is verified, but can be optionally set to unverified.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateOrganizationDomain" method="post" path="/organizations/{organization_id}/domains" -->
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

## list

Get a list of all domains of an organization.

### Example Usage

<!-- UsageSnippet language="php" operationID="ListOrganizationDomains" method="get" path="/organizations/{organization_id}/domains" -->
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

## update

Updates the properties of an existing organization domain.

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateOrganizationDomain" method="patch" path="/organizations/{organization_id}/domains/{domain_id}" -->
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

$requestBody = new Operations\UpdateOrganizationDomainRequestBody();

$response = $sdk->organizationDomains->update(
    organizationId: '<id>',
    domainId: '<id>',
    requestBody: $requestBody

);

if ($response->organizationDomain !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                        | Type                                                                                                             | Required                                                                                                         | Description                                                                                                      |
| ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- |
| `organizationId`                                                                                                 | *string*                                                                                                         | :heavy_check_mark:                                                                                               | The ID of the organization the domain belongs to                                                                 |
| `domainId`                                                                                                       | *string*                                                                                                         | :heavy_check_mark:                                                                                               | The ID of the domain                                                                                             |
| `requestBody`                                                                                                    | [Operations\UpdateOrganizationDomainRequestBody](../../Models/Operations/UpdateOrganizationDomainRequestBody.md) | :heavy_check_mark:                                                                                               | N/A                                                                                                              |

### Response

**[?Operations\UpdateOrganizationDomainResponse](../../Models/Operations/UpdateOrganizationDomainResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 404, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## delete

Removes the given domain from the organization.

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteOrganizationDomain" method="delete" path="/organizations/{organization_id}/domains/{domain_id}" -->
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

## listAll

Retrieves a list of all organization domains within the current instance.
This endpoint can be used to list all domains across all organizations
or filter domains by organization, verification status, enrollment mode, or search query.

The response includes pagination information and details about each domain
including its verification status, enrollment mode, and associated counts.


### Example Usage

<!-- UsageSnippet language="php" operationID="ListAllOrganizationDomains" method="get" path="/organization_domains" -->
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

$request = new Operations\ListAllOrganizationDomainsRequest();

$response = $sdk->organizationDomains->listAll(
    request: $request
);

if ($response->organizationDomains !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                    | Type                                                                                                         | Required                                                                                                     | Description                                                                                                  |
| ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                   | [Operations\ListAllOrganizationDomainsRequest](../../Models/Operations/ListAllOrganizationDomainsRequest.md) | :heavy_check_mark:                                                                                           | The request object to use for the request.                                                                   |

### Response

**[?Operations\ListAllOrganizationDomainsResponse](../../Models/Operations/ListAllOrganizationDomainsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
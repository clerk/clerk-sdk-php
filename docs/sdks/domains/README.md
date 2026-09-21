# Domains

## Overview

### Available Operations

* [list](#list) - List all instance domains
* [add](#add) - Add a domain
* [delete](#delete) - Delete a domain
* [update](#update) - Update a domain

## list

Use this endpoint to get a list of all domains for an instance.
The response will contain the primary domain for the instance and any satellite domains. Each domain in the response contains information about the URLs where Clerk operates and the required CNAME targets.

### Example Usage

<!-- UsageSnippet language="php" operationID="ListDomains" method="get" path="/domains" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->domains->list(

);

if ($response->domains !== null) {
    // handle response
}
```

### Response

**[?Operations\ListDomainsResponse](../../Models/Operations/ListDomainsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## add

Add a new domain for your instance.
Useful in the case of multi-domain instances, allows adding satellite domains to an instance.
The new domain must have a `name`. The domain name can contain the port for development instances, like `localhost:3000`.
Set `is_satellite` to `true` to add a satellite domain.
To migrate a production instance from an active provider domain to its first custom primary domain,
set `is_satellite` to `false`. The custom domain becomes active and the provider domain stays attached.
Additional custom primary domains are not supported.
If you're planning to configure the new satellite domain to run behind a proxy, pass the `proxy_url` parameter accordingly.

### Example Usage

<!-- UsageSnippet language="php" operationID="AddDomain" method="post" path="/domains" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->domains->add(
    request: $request
);

if ($response->domain !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                          | Type                                                                               | Required                                                                           | Description                                                                        |
| ---------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------- |
| `$request`                                                                         | [Operations\AddDomainRequestBody](../../Models/Operations/AddDomainRequestBody.md) | :heavy_check_mark:                                                                 | The request object to use for the request.                                         |

### Response

**[?Operations\AddDomainResponse](../../Models/Operations/AddDomainResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 402, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## delete

Deletes a domain for the instance.
The instance's active domain cannot be deleted.

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteDomain" method="delete" path="/domains/{domain_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->domains->delete(
    domainId: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                                  | Type                                       | Required                                   | Description                                |
| ------------------------------------------ | ------------------------------------------ | ------------------------------------------ | ------------------------------------------ |
| `domainId`                                 | *string*                                   | :heavy_check_mark:                         | The ID of the domain that will be deleted. |

### Response

**[?Operations\DeleteDomainResponse](../../Models/Operations/DeleteDomainResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 403, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## update

The `proxy_url` can be updated only for production instances.
Update one of the instance's domains. Both primary and satellite domains can be updated.
If you choose to use Clerk via proxy, use this endpoint to specify the `proxy_url`.
Whenever you decide you'd rather switch to DNS setup for Clerk, simply set `proxy_url`
to `null` for the domain. When you update a production instance's primary domain name,
you have to make sure that you've completed all the necessary setup steps for DNS and
emails to work. Expect downtime otherwise. Updating a primary domain's name will also
update the instance's home origin, affecting the default application paths.

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateDomain" method="patch" path="/domains/{domain_id}" -->
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

$requestBody = new Operations\UpdateDomainRequestBody();

$response = $sdk->domains->update(
    domainId: '<id>',
    requestBody: $requestBody

);

if ($response->domain !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                | Type                                                                                     | Required                                                                                 | Description                                                                              |
| ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- |
| `domainId`                                                                               | *string*                                                                                 | :heavy_check_mark:                                                                       | The ID of the domain that will be updated.                                               |
| `requestBody`                                                                            | [Operations\UpdateDomainRequestBody](../../Models/Operations/UpdateDomainRequestBody.md) | :heavy_check_mark:                                                                       | N/A                                                                                      |

### Response

**[?Operations\UpdateDomainResponse](../../Models/Operations/UpdateDomainResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 404, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
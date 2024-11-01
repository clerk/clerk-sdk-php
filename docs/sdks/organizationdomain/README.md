# OrganizationDomain
(*organizationDomain*)

## Overview

### Available Operations

* [update](#update) - Update an organization domain.

## update

Updates the properties of an existing organization domain.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();

$requestBody = new Operations\UpdateOrganizationDomainRequestBody();

$response = $sdk->organizationDomain->update(
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

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors86 | 400, 404, 422        | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |
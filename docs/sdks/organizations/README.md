# Organizations

## Overview

### Available Operations

* [list](#list) - Get a list of organizations for an instance
* [create](#create) - Create an organization
* [get](#get) - Retrieve an organization by ID or slug
* [update](#update) - Update an organization
* [delete](#delete) - Delete an organization
* [mergeMetadata](#mergemetadata) - Merge and update metadata for an organization
* [uploadLogo](#uploadlogo) - Upload a logo for the organization
* [deleteLogo](#deletelogo) - Delete the organization's logo.
* [getBillingSubscription](#getbillingsubscription) - Retrieve an organization's billing subscription
* [getBillingCreditBalance](#getbillingcreditbalance) - Retrieve an organization's credit balance
* [adjustBillingCreditBalance](#adjustbillingcreditbalance) - Adjust an organization's credit balance

## list

This request returns the list of organizations for an instance.
Results can be paginated using the optional `limit` and `offset` query parameters.
The organizations are ordered by descending creation date.
Most recent organizations will be returned first.

### Example Usage

<!-- UsageSnippet language="php" operationID="ListOrganizations" method="get" path="/organizations" -->
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

$request = new Operations\ListOrganizationsRequest();

$response = $sdk->organizations->list(
    request: $request
);

if ($response->organizations !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                  | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `$request`                                                                                 | [Operations\ListOrganizationsRequest](../../Models/Operations/ListOrganizationsRequest.md) | :heavy_check_mark:                                                                         | The request object to use for the request.                                                 |

### Response

**[?Operations\ListOrganizationsResponse](../../Models/Operations/ListOrganizationsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 403, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## create

Creates a new organization with the given name for an instance.
You can specify an optional slug for the new organization.
If provided, the organization slug can contain only lowercase alphanumeric characters (letters and digits) and the dash "-".
Organization slugs must be unique for the instance.
You can provide additional metadata for the organization and set any custom attribute you want.
Organizations support private and public metadata.
Private metadata can only be accessed from the Backend API.
Public metadata can be accessed from the Backend API, and are read-only from the Frontend API.
The `created_by` user will see this as their [active organization](https://clerk.com/docs/organizations/overview#active-organization)
the next time they create a session, presuming they don't explicitly set a different organization as active before then.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateOrganization" method="post" path="/organizations" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->organizations->create(
    request: $request
);

if ($response->organization !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                            | Type                                                                                                 | Required                                                                                             | Description                                                                                          |
| ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- |
| `$request`                                                                                           | [Operations\CreateOrganizationRequestBody](../../Models/Operations/CreateOrganizationRequestBody.md) | :heavy_check_mark:                                                                                   | The request object to use for the request.                                                           |

### Response

**[?Operations\CreateOrganizationResponse](../../Models/Operations/CreateOrganizationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 402, 403, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## get

Fetches the organization whose ID or slug matches the provided `id_or_slug` URL query parameter.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetOrganization" method="get" path="/organizations/{organization_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->organizations->get(
    organizationId: '<id>'
);

if ($response->organization !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                      | Type                                                                                                                           | Required                                                                                                                       | Description                                                                                                                    |
| ------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------ |
| `organizationId`                                                                                                               | *string*                                                                                                                       | :heavy_check_mark:                                                                                                             | The ID or slug of the organization                                                                                             |
| `includeMembersCount`                                                                                                          | *?bool*                                                                                                                        | :heavy_minus_sign:                                                                                                             | Flag to denote whether or not the organization's members count should be included in the response.                             |
| `includeMissingMemberWithElevatedPermissions`                                                                                  | *?bool*                                                                                                                        | :heavy_minus_sign:                                                                                                             | Flag to denote whether or not to include a member with elevated permissions who is not currently a member of the organization. |

### Response

**[?Operations\GetOrganizationResponse](../../Models/Operations/GetOrganizationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 403, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## update

Updates an existing organization

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateOrganization" method="patch" path="/organizations/{organization_id}" -->
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

$requestBody = new Operations\UpdateOrganizationRequestBody();

$response = $sdk->organizations->update(
    organizationId: '<id>',
    requestBody: $requestBody

);

if ($response->organization !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                            | Type                                                                                                 | Required                                                                                             | Description                                                                                          |
| ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- |
| `organizationId`                                                                                     | *string*                                                                                             | :heavy_check_mark:                                                                                   | The ID of the organization to update                                                                 |
| `requestBody`                                                                                        | [Operations\UpdateOrganizationRequestBody](../../Models/Operations/UpdateOrganizationRequestBody.md) | :heavy_check_mark:                                                                                   | N/A                                                                                                  |

### Response

**[?Operations\UpdateOrganizationResponse](../../Models/Operations/UpdateOrganizationResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 402, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## delete

Deletes the given organization.
Please note that deleting an organization will also delete all memberships and invitations.
This is not reversible.

After the organization is deleted, any user's active sessions that contain the deleted
organization will be cleared.

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteOrganization" method="delete" path="/organizations/{organization_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->organizations->delete(
    organizationId: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                            | Type                                 | Required                             | Description                          |
| ------------------------------------ | ------------------------------------ | ------------------------------------ | ------------------------------------ |
| `organizationId`                     | *string*                             | :heavy_check_mark:                   | The ID of the organization to delete |

### Response

**[?Operations\DeleteOrganizationResponse](../../Models/Operations/DeleteOrganizationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 404                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## mergeMetadata

Update organization metadata attributes by merging existing values with the provided parameters.
Metadata values will be updated via a deep merge.
Deep meaning that any nested JSON objects will be merged as well.
You can remove metadata keys at any level by setting their value to `null`.

### Example Usage

<!-- UsageSnippet language="php" operationID="MergeOrganizationMetadata" method="patch" path="/organizations/{organization_id}/metadata" -->
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

$requestBody = new Operations\MergeOrganizationMetadataRequestBody();

$response = $sdk->organizations->mergeMetadata(
    organizationId: '<id>',
    requestBody: $requestBody

);

if ($response->organization !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                          | Type                                                                                                               | Required                                                                                                           | Description                                                                                                        |
| ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ |
| `organizationId`                                                                                                   | *string*                                                                                                           | :heavy_check_mark:                                                                                                 | The ID of the organization for which metadata will be merged or updated                                            |
| `requestBody`                                                                                                      | [Operations\MergeOrganizationMetadataRequestBody](../../Models/Operations/MergeOrganizationMetadataRequestBody.md) | :heavy_check_mark:                                                                                                 | N/A                                                                                                                |

### Response

**[?Operations\MergeOrganizationMetadataResponse](../../Models/Operations/MergeOrganizationMetadataResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 404, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## uploadLogo

Set or replace an organization's logo, by uploading an image file.
This endpoint uses the `multipart/form-data` request content type and accepts a file of image type.
The file size cannot exceed 10MB.
Only the following file content types are supported: `image/jpeg`, `image/png`, `image/gif`, `image/webp`.

### Example Usage

<!-- UsageSnippet language="php" operationID="UploadOrganizationLogo" method="put" path="/organizations/{organization_id}/logo" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->organizations->uploadLogo(
    organizationId: '<id>',
    requestBody: $requestBody

);

if ($response->organizationWithLogo !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                     | Type                                                                                                          | Required                                                                                                      | Description                                                                                                   |
| ------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------- |
| `organizationId`                                                                                              | *string*                                                                                                      | :heavy_check_mark:                                                                                            | The ID of the organization for which to upload a logo                                                         |
| `requestBody`                                                                                                 | [?Operations\UploadOrganizationLogoRequestBody](../../Models/Operations/UploadOrganizationLogoRequestBody.md) | :heavy_minus_sign:                                                                                            | N/A                                                                                                           |

### Response

**[?Operations\UploadOrganizationLogoResponse](../../Models/Operations/UploadOrganizationLogoResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 403, 404, 413  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## deleteLogo

Delete the organization's logo.

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteOrganizationLogo" method="delete" path="/organizations/{organization_id}/logo" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->organizations->deleteLogo(
    organizationId: '<id>'
);

if ($response->organization !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                      | Type                                                           | Required                                                       | Description                                                    |
| -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- |
| `organizationId`                                               | *string*                                                       | :heavy_check_mark:                                             | The ID of the organization for which the logo will be deleted. |

### Response

**[?Operations\DeleteOrganizationLogoResponse](../../Models/Operations/DeleteOrganizationLogoResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 404                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## getBillingSubscription

Retrieves the billing subscription for the specified organization.
This includes subscription details, active plans, billing information, and payment status.
The subscription contains subscription items which represent the individual plans the organization is subscribed to.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetOrganizationBillingSubscription" method="get" path="/organizations/{organization_id}/billing/subscription" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->organizations->getBillingSubscription(
    organizationId: '<id>'
);

if ($response->commerceSubscription !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                 | Type                                                      | Required                                                  | Description                                               |
| --------------------------------------------------------- | --------------------------------------------------------- | --------------------------------------------------------- | --------------------------------------------------------- |
| `organizationId`                                          | *string*                                                  | :heavy_check_mark:                                        | The ID of the organization whose subscription to retrieve |

### Response

**[?Operations\GetOrganizationBillingSubscriptionResponse](../../Models/Operations/GetOrganizationBillingSubscriptionResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\ClerkErrors      | 500                     | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## getBillingCreditBalance

Retrieves the current credit balance for the specified organization.
Credits can be applied during checkout to reduce the charge or automatically applied to upcoming recurring charges.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetOrganizationBillingCreditBalance" method="get" path="/organizations/{organization_id}/billing/credits" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->organizations->getBillingCreditBalance(
    organizationId: '<id>'
);

if ($response->commerceCreditBalanceResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                   | Type                                                        | Required                                                    | Description                                                 |
| ----------------------------------------------------------- | ----------------------------------------------------------- | ----------------------------------------------------------- | ----------------------------------------------------------- |
| `organizationId`                                            | *string*                                                    | :heavy_check_mark:                                          | The ID of the organization whose credit balance to retrieve |

### Response

**[?Operations\GetOrganizationBillingCreditBalanceResponse](../../Models/Operations/GetOrganizationBillingCreditBalanceResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\ClerkErrors      | 500                     | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## adjustBillingCreditBalance

Increases or decreases the credit balance for the specified organization.
Each adjustment is recorded as a ledger entry. The idempotency_key parameter
ensures that duplicate requests are safely handled.

### Example Usage

<!-- UsageSnippet language="php" operationID="AdjustOrganizationBillingCreditBalance" method="post" path="/organizations/{organization_id}/billing/credits" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Components;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();

$adjustCreditBalanceRequest = new Components\AdjustCreditBalanceRequest(
    amount: 245081,
    action: Components\Action::Increase,
    idempotencyKey: '<value>',
);

$response = $sdk->organizations->adjustBillingCreditBalance(
    organizationId: '<id>',
    adjustCreditBalanceRequest: $adjustCreditBalanceRequest

);

if ($response->commerceCreditLedgerResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                      | Type                                                                                           | Required                                                                                       | Description                                                                                    |
| ---------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------- |
| `organizationId`                                                                               | *string*                                                                                       | :heavy_check_mark:                                                                             | The ID of the organization whose credit balance to adjust                                      |
| `adjustCreditBalanceRequest`                                                                   | [Components\AdjustCreditBalanceRequest](../../Models/Components/AdjustCreditBalanceRequest.md) | :heavy_check_mark:                                                                             | Parameters for the credit balance adjustment                                                   |

### Response

**[?Operations\AdjustOrganizationBillingCreditBalanceResponse](../../Models/Operations/AdjustOrganizationBillingCreditBalanceResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\ClerkErrors           | 400, 401, 403, 404, 409, 422 | application/json             |
| Errors\ClerkErrors           | 500                          | application/json             |
| Errors\SDKException          | 4XX, 5XX                     | \*/\*                        |
# AdminPortalLinkTokens

## Overview

### Available Operations

* [createAdminPortalLinkToken](#createadminportallinktoken) - Create an Admin Portal Link Token
* [revokeAdminPortalLinkToken](#revokeadminportallinktoken) - Revoke an Admin Portal Link Token

## createAdminPortalLinkToken

Create an Admin Portal Link Token

### Example Usage

<!-- UsageSnippet language="php" operationID="createAdminPortalLinkToken" method="post" path="/admin_portal_link_tokens" -->
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

$request = new Operations\CreateAdminPortalLinkTokenRequestBody();

$response = $sdk->adminPortalLinkTokens->createAdminPortalLinkToken(
    request: $request
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                            | Type                                                                                                                 | Required                                                                                                             | Description                                                                                                          |
| -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                           | [Operations\CreateAdminPortalLinkTokenRequestBody](../../Models/Operations/CreateAdminPortalLinkTokenRequestBody.md) | :heavy_check_mark:                                                                                                   | The request object to use for the request.                                                                           |

### Response

**[?Operations\CreateAdminPortalLinkTokenResponse](../../Models/Operations/CreateAdminPortalLinkTokenResponse.md)**

### Errors

| Error Type                                                                    | Status Code                                                                   | Content Type                                                                  |
| ----------------------------------------------------------------------------- | ----------------------------------------------------------------------------- | ----------------------------------------------------------------------------- |
| Errors\CreateAdminPortalLinkTokenResponseBody                                 | 400                                                                           | application/json                                                              |
| Errors\CreateAdminPortalLinkTokenAdminPortalLinkTokensResponseBody            | 401                                                                           | application/json                                                              |
| Errors\CreateAdminPortalLinkTokenAdminPortalLinkTokensResponseResponseBody    | 403                                                                           | application/json                                                              |
| Errors\CreateAdminPortalLinkTokenAdminPortalLinkTokensResponse409ResponseBody | 409                                                                           | application/json                                                              |
| Errors\SDKException                                                           | 4XX, 5XX                                                                      | \*/\*                                                                         |

## revokeAdminPortalLinkToken

Revoke an Admin Portal Link Token

### Example Usage

<!-- UsageSnippet language="php" operationID="revokeAdminPortalLinkToken" method="post" path="/admin_portal_link_tokens/{adminPortalLinkTokenID}/revoke" -->
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

$requestBody = new Operations\RevokeAdminPortalLinkTokenRequestBody();

$response = $sdk->adminPortalLinkTokens->revokeAdminPortalLinkToken(
    adminPortalLinkTokenID: '<id>',
    requestBody: $requestBody

);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                            | Type                                                                                                                 | Required                                                                                                             | Description                                                                                                          |
| -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `adminPortalLinkTokenID`                                                                                             | *string*                                                                                                             | :heavy_check_mark:                                                                                                   | N/A                                                                                                                  |
| `requestBody`                                                                                                        | [Operations\RevokeAdminPortalLinkTokenRequestBody](../../Models/Operations/RevokeAdminPortalLinkTokenRequestBody.md) | :heavy_check_mark:                                                                                                   | N/A                                                                                                                  |

### Response

**[?Operations\RevokeAdminPortalLinkTokenResponse](../../Models/Operations/RevokeAdminPortalLinkTokenResponse.md)**

### Errors

| Error Type                                                                    | Status Code                                                                   | Content Type                                                                  |
| ----------------------------------------------------------------------------- | ----------------------------------------------------------------------------- | ----------------------------------------------------------------------------- |
| Errors\RevokeAdminPortalLinkTokenResponseBody                                 | 400                                                                           | application/json                                                              |
| Errors\RevokeAdminPortalLinkTokenAdminPortalLinkTokensResponseBody            | 401                                                                           | application/json                                                              |
| Errors\RevokeAdminPortalLinkTokenAdminPortalLinkTokensResponseResponseBody    | 403                                                                           | application/json                                                              |
| Errors\RevokeAdminPortalLinkTokenAdminPortalLinkTokensResponse404ResponseBody | 404                                                                           | application/json                                                              |
| Errors\SDKException                                                           | 4XX, 5XX                                                                      | \*/\*                                                                         |
# OauthApplications

## Overview

### Available Operations

* [list](#list) - Get a list of OAuth applications for an instance
* [create](#create) - Create an OAuth application
* [get](#get) - Retrieve an OAuth application by ID
* [update](#update) - Update an OAuth application
* [delete](#delete) - Delete an OAuth application
* [uploadLogo](#uploadlogo) - Upload a logo for the OAuth application
* [rotateSecret](#rotatesecret) - Rotate the client secret of the given OAuth application
* [revokeToken](#revoketoken) - Revoke an OAuth application token

## list

This request returns the list of OAuth applications for an instance.
Results can be paginated using the optional `limit` and `offset` query parameters.
The OAuth applications are ordered by descending creation date.
Most recent OAuth applications will be returned first.

### Example Usage

<!-- UsageSnippet language="php" operationID="ListOAuthApplications" method="get" path="/oauth_applications" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->oauthApplications->list(
    limit: 10,
    offset: 0,
    orderBy: '+created_at'

);

if ($response->oAuthApplications !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            | Type                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 | Required                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             | Description                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          |
| ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `limit`                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              | *?int*                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   | Applies a limit to the number of results returned.<br/>Can be used for paginating the results together with `offset`.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                |
| `offset`                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             | *?int*                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   | Skip the first `offset` results when paginating.<br/>Needs to be an integer greater or equal to zero.<br/>To be used in conjunction with `limit`.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    |
| `orderBy`                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            | *?string*                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   | Allows to return OAuth applications in a particular order.<br/>At the moment, you can order the returned OAuth applications by their `created_at` and `name`.<br/>In order to specify the direction, you can use the `+/-` symbols prepended in the property to order by.<br/>For example, if you want OAuth applications to be returned in descending order according to their `created_at` property, you can use `-created_at`.<br/>If you don't use `+` or `-`, then `+` is implied. We only support one `order_by` parameter, and if multiple `order_by` parameters are provided, we will only keep the first one. For example,<br/>if you pass `order_by=name&order_by=created_at`, we will consider only the first `order_by` parameter, which is `name`. The `created_at` parameter will be ignored in this case. |
| `nameQuery`                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          | *?string*                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            | :heavy_minus_sign:                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   | Returns OAuth applications with names that match the given query, via case-insensitive partial match.<br/>Also returns the OAuth application whose `client_id` is exactly the given query, which is useful for<br/>resolving a `client_id` to the OAuth application `id` required by the read, update and delete endpoints.                                                                                                                                                                                                                                                                                                                                                                                                                                                                          |

### Response

**[?Operations\ListOAuthApplicationsResponse](../../Models/Operations/ListOAuthApplicationsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 403, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## create

Creates a new OAuth application with the given name and callback URL for an instance.
The callback URL must be a valid URL.
All URL schemes are allowed such as `http://`, `https://`, `myapp://`, etc...

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateOAuthApplication" method="post" path="/oauth_applications" -->
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

$request = new Operations\CreateOAuthApplicationRequestBody(
    name: '<value>',
    scopes: 'profile email public_metadata',
);

$response = $sdk->oauthApplications->create(
    request: $request
);

if ($response->oAuthApplicationWithSecret !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                    | Type                                                                                                         | Required                                                                                                     | Description                                                                                                  |
| ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                   | [Operations\CreateOAuthApplicationRequestBody](../../Models/Operations/CreateOAuthApplicationRequestBody.md) | :heavy_check_mark:                                                                                           | The request object to use for the request.                                                                   |

### Response

**[?Operations\CreateOAuthApplicationResponse](../../Models/Operations/CreateOAuthApplicationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 403, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## get

Fetches the OAuth application whose ID matches the provided `id` in the path.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetOAuthApplication" method="get" path="/oauth_applications/{oauth_application_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->oauthApplications->get(
    oauthApplicationId: '<id>'
);

if ($response->oAuthApplication !== null) {
    // handle response
}
```

### Parameters

| Parameter                       | Type                            | Required                        | Description                     |
| ------------------------------- | ------------------------------- | ------------------------------- | ------------------------------- |
| `oauthApplicationId`            | *string*                        | :heavy_check_mark:              | The ID of the OAuth application |

### Response

**[?Operations\GetOAuthApplicationResponse](../../Models/Operations/GetOAuthApplicationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 403, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## update

Updates an existing OAuth application

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateOAuthApplication" method="patch" path="/oauth_applications/{oauth_application_id}" -->
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

$requestBody = new Operations\UpdateOAuthApplicationRequestBody(
    scopes: 'profile email public_metadata private_metadata',
);

$response = $sdk->oauthApplications->update(
    oauthApplicationId: '<id>',
    requestBody: $requestBody

);

if ($response->oAuthApplication !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                    | Type                                                                                                         | Required                                                                                                     | Description                                                                                                  |
| ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ |
| `oauthApplicationId`                                                                                         | *string*                                                                                                     | :heavy_check_mark:                                                                                           | The ID of the OAuth application to update                                                                    |
| `requestBody`                                                                                                | [Operations\UpdateOAuthApplicationRequestBody](../../Models/Operations/UpdateOAuthApplicationRequestBody.md) | :heavy_check_mark:                                                                                           | N/A                                                                                                          |

### Response

**[?Operations\UpdateOAuthApplicationResponse](../../Models/Operations/UpdateOAuthApplicationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 403, 404, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## delete

Deletes the given OAuth application.
This is not reversible.

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteOAuthApplication" method="delete" path="/oauth_applications/{oauth_application_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->oauthApplications->delete(
    oauthApplicationId: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                                 | Type                                      | Required                                  | Description                               |
| ----------------------------------------- | ----------------------------------------- | ----------------------------------------- | ----------------------------------------- |
| `oauthApplicationId`                      | *string*                                  | :heavy_check_mark:                        | The ID of the OAuth application to delete |

### Response

**[?Operations\DeleteOAuthApplicationResponse](../../Models/Operations/DeleteOAuthApplicationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 403, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## uploadLogo

Set or replace an OAuth application's logo by uploading an image file.
This endpoint uses the `multipart/form-data` request content type and accepts a file of image type.
The file size cannot exceed 10MB.
Only the following file content types are supported: `image/jpeg`, `image/png`, `image/gif`, `image/webp`.

### Example Usage

<!-- UsageSnippet language="php" operationID="UploadOAuthApplicationLogo" method="put" path="/oauth_applications/{oauth_application_id}/logo" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->oauthApplications->uploadLogo(
    oauthApplicationId: '<id>',
    requestBody: $requestBody

);

if ($response->oAuthApplication !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                             | Type                                                                                                                  | Required                                                                                                              | Description                                                                                                           |
| --------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------- |
| `oauthApplicationId`                                                                                                  | *string*                                                                                                              | :heavy_check_mark:                                                                                                    | The ID of the OAuth application for which to upload a logo                                                            |
| `requestBody`                                                                                                         | [?Operations\UploadOAuthApplicationLogoRequestBody](../../Models/Operations/UploadOAuthApplicationLogoRequestBody.md) | :heavy_minus_sign:                                                                                                    | N/A                                                                                                                   |

### Response

**[?Operations\UploadOAuthApplicationLogoResponse](../../Models/Operations/UploadOAuthApplicationLogoResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 403, 404, 413  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## rotateSecret

Rotates the OAuth application's client secret.
When the client secret is rotated, make sure to update it in authorized OAuth clients.

### Example Usage

<!-- UsageSnippet language="php" operationID="RotateOAuthApplicationSecret" method="post" path="/oauth_applications/{oauth_application_id}/rotate_secret" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->oauthApplications->rotateSecret(
    oauthApplicationId: '<id>'
);

if ($response->oAuthApplicationWithSecret !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                             | Type                                                                  | Required                                                              | Description                                                           |
| --------------------------------------------------------------------- | --------------------------------------------------------------------- | --------------------------------------------------------------------- | --------------------------------------------------------------------- |
| `oauthApplicationId`                                                  | *string*                                                              | :heavy_check_mark:                                                    | The ID of the OAuth application for which to rotate the client secret |

### Response

**[?Operations\RotateOAuthApplicationSecretResponse](../../Models/Operations/RotateOAuthApplicationSecretResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 403, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## revokeToken

Revoke both OAuth access token and refresh token for the associated grant for the given OAuth application.
The request may specify either token.
JWT access tokens cannot be revoked.

### Example Usage

<!-- UsageSnippet language="php" operationID="RevokeOAuthApplicationToken" method="post" path="/oauth_applications/{oauth_application_id}/revoke_token" -->
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

$requestBody = new Operations\RevokeOAuthApplicationTokenRequestBody(
    token: '<value>',
);

$response = $sdk->oauthApplications->revokeToken(
    oauthApplicationId: '<id>',
    requestBody: $requestBody

);

if ($response->statusCode === 200) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                              | Type                                                                                                                   | Required                                                                                                               | Description                                                                                                            |
| ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- |
| `oauthApplicationId`                                                                                                   | *string*                                                                                                               | :heavy_check_mark:                                                                                                     | The ID of the OAuth application for which to revoke the token                                                          |
| `requestBody`                                                                                                          | [Operations\RevokeOAuthApplicationTokenRequestBody](../../Models/Operations/RevokeOAuthApplicationTokenRequestBody.md) | :heavy_check_mark:                                                                                                     | N/A                                                                                                                    |

### Response

**[?Operations\RevokeOAuthApplicationTokenResponse](../../Models/Operations/RevokeOAuthApplicationTokenResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 403, 404, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
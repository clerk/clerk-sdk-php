# OauthApplications
(*oauthApplications*)

## Overview

### Available Operations

* [list](#list) - Get a list of OAuth applications for an instance
* [create](#create) - Create an OAuth application
* [get](#get) - Retrieve an OAuth application by ID
* [update](#update) - Update an OAuth application
* [delete](#delete) - Delete an OAuth application
* [rotateSecret](#rotatesecret) - Rotate the client secret of the given OAuth application

## list

This request returns the list of OAuth applications for an instance.
Results can be paginated using the optional `limit` and `offset` query parameters.
The OAuth applications are ordered by descending creation date.
Most recent OAuth applications will be returned first.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



$response = $sdk->oauthApplications->list(
    limit: 10,
    offset: 0

);

if ($response->oAuthApplications !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                 | Type                                                                                                                                      | Required                                                                                                                                  | Description                                                                                                                               |
| ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- |
| `limit`                                                                                                                                   | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Applies a limit to the number of results returned.<br/>Can be used for paginating the results together with `offset`.                     |
| `offset`                                                                                                                                  | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Skip the first `offset` results when paginating.<br/>Needs to be an integer greater or equal to zero.<br/>To be used in conjunction with `limit`. |

### Response

**[?Operations\ListOAuthApplicationsResponse](../../Models/Operations/ListOAuthApplicationsResponse.md)**

### Errors

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors93 | 400, 403, 422        | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |

## create

Creates a new OAuth application with the given name and callback URL for an instance.
The callback URL must be a valid url.
All URL schemes are allowed such as `http://`, `https://`, `myapp://`, etc...

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();

$request = new Operations\CreateOAuthApplicationRequestBody(
    name: '<value>',
    callbackUrl: 'https://probable-heating.com/',
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

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors94 | 400, 403, 422        | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |

## get

Fetches the OAuth application whose ID matches the provided `id` in the path.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



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

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors95 | 403, 404             | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |

## update

Updates an existing OAuth application

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();

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

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors96 | 403, 404, 422        | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |

## delete

Deletes the given OAuth application.
This is not reversible.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



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

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors97 | 403, 404             | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |

## rotateSecret

Rotates the OAuth application's client secret.
When the client secret is rotated, make sure to update it in authorized OAuth clients.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



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

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors98 | 403, 404             | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |
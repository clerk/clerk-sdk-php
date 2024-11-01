# SignInTokens
(*signInTokens*)

## Overview

### Available Operations

* [create](#create) - Create sign-in token
* [revoke](#revoke) - Revoke the given sign-in token

## create

Creates a new sign-in token and associates it with the given user.
By default, sign-in tokens expire in 30 days.
You can optionally supply a different duration in seconds using the `expires_in_seconds` property.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();

$request = new Operations\CreateSignInTokenRequestBody();

$response = $sdk->signInTokens->create(
    request: $request
);

if ($response->signInToken !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                          | Type                                                                                               | Required                                                                                           | Description                                                                                        |
| -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- |
| `$request`                                                                                         | [Operations\CreateSignInTokenRequestBody](../../Models/Operations/CreateSignInTokenRequestBody.md) | :heavy_check_mark:                                                                                 | The request object to use for the request.                                                         |

### Response

**[?Operations\CreateSignInTokenResponse](../../Models/Operations/CreateSignInTokenResponse.md)**

### Errors

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors91 | 404, 422             | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |

## revoke

Revokes a pending sign-in token

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



$response = $sdk->signInTokens->revoke(
    signInTokenId: '<id>'
);

if ($response->signInToken !== null) {
    // handle response
}
```

### Parameters

| Parameter                                 | Type                                      | Required                                  | Description                               |
| ----------------------------------------- | ----------------------------------------- | ----------------------------------------- | ----------------------------------------- |
| `signInTokenId`                           | *string*                                  | :heavy_check_mark:                        | The ID of the sign-in token to be revoked |

### Response

**[?Operations\RevokeSignInTokenResponse](../../Models/Operations/RevokeSignInTokenResponse.md)**

### Errors

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors92 | 400, 404             | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |
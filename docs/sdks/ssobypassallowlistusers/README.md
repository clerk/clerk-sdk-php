# SsoBypassAllowlistUsers

## Overview

### Available Operations

* [list](#list) - List the SSO bypass allowlist
* [create](#create) - Add a user to the SSO bypass allowlist
* [delete](#delete) - Remove a user from the SSO bypass allowlist

## list

Returns the users who may verify an email code instead of reaching their identity provider when
enterprise SSO is unreachable.

### Example Usage

<!-- UsageSnippet language="php" operationID="ListSSOBypassAllowlistUsers" method="get" path="/sso_bypass_allowlist_users" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->ssoBypassAllowlistUsers->list(

);

if ($response->ssoBypassAllowlistUsers !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                         | Type                                                              | Required                                                          | Description                                                       |
| ----------------------------------------------------------------- | ----------------------------------------------------------------- | ----------------------------------------------------------------- | ----------------------------------------------------------------- |
| `enterpriseConnectionId`                                          | *?string*                                                         | :heavy_minus_sign:                                                | Restrict the list to the users this enterprise connection serves. |

### Response

**[?Operations\ListSSOBypassAllowlistUsersResponse](../../Models/Operations/ListSSOBypassAllowlistUsersResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 403, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## create

Puts a user on the allowlist. The request is rejected unless the user holds a verified email
address on a domain one of the instance's enterprise connections serves.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateSSOBypassAllowlistUser" method="post" path="/sso_bypass_allowlist_users" -->
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

$request = new Operations\CreateSSOBypassAllowlistUserRequestBody(
    userId: '<id>',
);

$response = $sdk->ssoBypassAllowlistUsers->create(
    request: $request
);

if ($response->ssoBypassAllowlistUser !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                | Type                                                                                                                     | Required                                                                                                                 | Description                                                                                                              |
| ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                               | [Operations\CreateSSOBypassAllowlistUserRequestBody](../../Models/Operations/CreateSSOBypassAllowlistUserRequestBody.md) | :heavy_check_mark:                                                                                                       | The request object to use for the request.                                                                               |

### Response

**[?Operations\CreateSSOBypassAllowlistUserResponse](../../Models/Operations/CreateSSOBypassAllowlistUserResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 402, 403, 404, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## delete

Removes the user from the allowlist, across every enterprise connection that serves them.

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteSSOBypassAllowlistUser" method="delete" path="/sso_bypass_allowlist_users/{userID}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->ssoBypassAllowlistUsers->delete(
    userID: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                      | Type                           | Required                       | Description                    |
| ------------------------------ | ------------------------------ | ------------------------------ | ------------------------------ |
| `userID`                       | *string*                       | :heavy_check_mark:             | The ID of the allowlisted user |

### Response

**[?Operations\DeleteSSOBypassAllowlistUserResponse](../../Models/Operations/DeleteSSOBypassAllowlistUserResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 403, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
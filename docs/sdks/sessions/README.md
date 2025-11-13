# Sessions
(*sessions*)

## Overview

### Available Operations

* [list](#list) - List all sessions
* [create](#create) - Create a new active session
* [get](#get) - Retrieve a session
* [refresh](#refresh) - Refresh a session
* [revoke](#revoke) - Revoke a session
* [createToken](#createtoken) - Create a session token
* [createTokenFromTemplate](#createtokenfromtemplate) - Create a session token from a JWT template

## list

Returns a list of all sessions.
The sessions are returned sorted by creation date, with the newest sessions appearing first.
**Deprecation Notice (2024-01-01):** All parameters were initially considered optional, however
moving forward at least one of `client_id` or `user_id` parameters should be provided.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetSessionList" method="get" path="/sessions" -->
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

$request = new Operations\GetSessionListRequest();

$response = $sdk->sessions->list(
    request: $request
);

if ($response->sessionList !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                            | Type                                                                                 | Required                                                                             | Description                                                                          |
| ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ |
| `$request`                                                                           | [Operations\GetSessionListRequest](../../Models/Operations/GetSessionListRequest.md) | :heavy_check_mark:                                                                   | The request object to use for the request.                                           |

### Response

**[?Operations\GetSessionListResponse](../../Models/Operations/GetSessionListResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## create

Create a new active session for the provided user ID.

**This operation is intended only for use in testing, and is not available for production instances.** If you are looking to generate a user session from the backend,
we recommend using the [Sign-in Tokens](https://clerk.com/docs/reference/backend-api/tag/Sign-in-Tokens#operation/CreateSignInToken) resource instead.

### Example Usage

<!-- UsageSnippet language="php" operationID="createSession" method="post" path="/sessions" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->sessions->create(
    request: $request
);

if ($response->session !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                  | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `$request`                                                                                 | [Operations\CreateSessionRequestBody](../../Models/Operations/CreateSessionRequestBody.md) | :heavy_check_mark:                                                                         | The request object to use for the request.                                                 |

### Response

**[?Operations\CreateSessionResponse](../../Models/Operations/CreateSessionResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 404, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## get

Retrieve the details of a session

### Example Usage

<!-- UsageSnippet language="php" operationID="GetSession" method="get" path="/sessions/{session_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->sessions->get(
    sessionId: '<id>'
);

if ($response->session !== null) {
    // handle response
}
```

### Parameters

| Parameter             | Type                  | Required              | Description           |
| --------------------- | --------------------- | --------------------- | --------------------- |
| `sessionId`           | *string*              | :heavy_check_mark:    | The ID of the session |

### Response

**[?Operations\GetSessionResponse](../../Models/Operations/GetSessionResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## refresh

Refreshes a session by creating a new session token. A 401 is returned when there
are validation errors, which signals the SDKs to fall back to the handshake flow.

### Example Usage

<!-- UsageSnippet language="php" operationID="RefreshSession" method="post" path="/sessions/{session_id}/refresh" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->sessions->refresh(
    sessionId: '<id>',
    requestBody: $requestBody

);

if ($response->sessionRefresh !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                     | Type                                                                                          | Required                                                                                      | Description                                                                                   |
| --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- |
| `sessionId`                                                                                   | *string*                                                                                      | :heavy_check_mark:                                                                            | The ID of the session                                                                         |
| `requestBody`                                                                                 | [?Operations\RefreshSessionRequestBody](../../Models/Operations/RefreshSessionRequestBody.md) | :heavy_minus_sign:                                                                            | Refresh session parameters                                                                    |

### Response

**[?Operations\RefreshSessionResponse](../../Models/Operations/RefreshSessionResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## revoke

Sets the status of a session as "revoked", which is an unauthenticated state.
In multi-session mode, a revoked session will still be returned along with its client object, however the user will need to sign in again.

### Example Usage

<!-- UsageSnippet language="php" operationID="RevokeSession" method="post" path="/sessions/{session_id}/revoke" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->sessions->revoke(
    sessionId: '<id>'
);

if ($response->session !== null) {
    // handle response
}
```

### Parameters

| Parameter             | Type                  | Required              | Description           |
| --------------------- | --------------------- | --------------------- | --------------------- |
| `sessionId`           | *string*              | :heavy_check_mark:    | The ID of the session |

### Response

**[?Operations\RevokeSessionResponse](../../Models/Operations/RevokeSessionResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## createToken

Creates a session JSON Web Token (JWT) based on a session.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateSessionToken" method="post" path="/sessions/{session_id}/tokens" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->sessions->createToken(
    sessionId: '<id>',
    requestBody: $requestBody

);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                             | Type                                                                                                  | Required                                                                                              | Description                                                                                           |
| ----------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- |
| `sessionId`                                                                                           | *string*                                                                                              | :heavy_check_mark:                                                                                    | The ID of the session                                                                                 |
| `requestBody`                                                                                         | [?Operations\CreateSessionTokenRequestBody](../../Models/Operations/CreateSessionTokenRequestBody.md) | :heavy_minus_sign:                                                                                    | N/A                                                                                                   |

### Response

**[?Operations\CreateSessionTokenResponse](../../Models/Operations/CreateSessionTokenResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## createTokenFromTemplate

Creates a JSON Web Token (JWT) based on a session and a JWT Template name defined for your instance

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateSessionTokenFromTemplate" method="post" path="/sessions/{session_id}/tokens/{template_name}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->sessions->createTokenFromTemplate(
    sessionId: '<id>',
    templateName: '<value>',
    requestBody: $requestBody

);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                     | Type                                                                                                                          | Required                                                                                                                      | Description                                                                                                                   |
| ----------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------- |
| `sessionId`                                                                                                                   | *string*                                                                                                                      | :heavy_check_mark:                                                                                                            | The ID of the session                                                                                                         |
| `templateName`                                                                                                                | *string*                                                                                                                      | :heavy_check_mark:                                                                                                            | The name of the JWT template defined in your instance (e.g. `custom_hasura`).                                                 |
| `requestBody`                                                                                                                 | [?Operations\CreateSessionTokenFromTemplateRequestBody](../../Models/Operations/CreateSessionTokenFromTemplateRequestBody.md) | :heavy_minus_sign:                                                                                                            | N/A                                                                                                                           |

### Response

**[?Operations\CreateSessionTokenFromTemplateResponse](../../Models/Operations/CreateSessionTokenFromTemplateResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
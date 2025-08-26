# M2m
(*m2m*)

## Overview

### Available Operations

* [createToken](#createtoken) - Create a M2M Token
* [listTokens](#listtokens) - Get M2M Tokens
* [revokeToken](#revoketoken) - Revoke a M2M Token
* [verifyToken](#verifytoken) - Verify a M2M Token

## createToken

Creates a new M2M Token. Must be authenticated via a Machine Secret Key.

### Example Usage

<!-- UsageSnippet language="php" operationID="createM2MToken" method="post" path="/m2m_tokens" -->
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

$request = new Operations\CreateM2MTokenRequestBody();

$response = $sdk->m2m->createToken(
    request: $request
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                    | Type                                                                                         | Required                                                                                     | Description                                                                                  |
| -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- |
| `$request`                                                                                   | [Operations\CreateM2MTokenRequestBody](../../Models/Operations/CreateM2MTokenRequestBody.md) | :heavy_check_mark:                                                                           | The request object to use for the request.                                                   |

### Response

**[?Operations\CreateM2MTokenResponse](../../Models/Operations/CreateM2MTokenResponse.md)**

### Errors

| Error Type                           | Status Code                          | Content Type                         |
| ------------------------------------ | ------------------------------------ | ------------------------------------ |
| Errors\CreateM2MTokenResponseBody    | 400                                  | application/json                     |
| Errors\CreateM2MTokenM2mResponseBody | 409                                  | application/json                     |
| Errors\SDKException                  | 4XX, 5XX                             | \*/\*                                |

## listTokens

Fetches M2M tokens for a specific machine.

This endpoint can be authenticated by either a Machine Secret Key or by a Clerk Secret Key.

- When fetching M2M tokens with a Machine Secret Key, only tokens associated with the authenticated machine can be retrieved.
- When fetching M2M tokens with a Clerk Secret Key, tokens for any machine in the instance can be retrieved.

### Example Usage

<!-- UsageSnippet language="php" operationID="getM2MTokens" method="get" path="/m2m_tokens" -->
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

$request = new Operations\GetM2MTokensRequest(
    subject: '<value>',
);

$response = $sdk->m2m->listTokens(
    request: $request
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                        | Type                                                                             | Required                                                                         | Description                                                                      |
| -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- |
| `$request`                                                                       | [Operations\GetM2MTokensRequest](../../Models/Operations/GetM2MTokensRequest.md) | :heavy_check_mark:                                                               | The request object to use for the request.                                       |

### Response

**[?Operations\GetM2MTokensResponse](../../Models/Operations/GetM2MTokensResponse.md)**

### Errors

| Error Type                                 | Status Code                                | Content Type                               |
| ------------------------------------------ | ------------------------------------------ | ------------------------------------------ |
| Errors\GetM2MTokensResponseBody            | 400                                        | application/json                           |
| Errors\GetM2MTokensM2mResponseBody         | 403                                        | application/json                           |
| Errors\GetM2MTokensM2mResponseResponseBody | 404                                        | application/json                           |
| Errors\SDKException                        | 4XX, 5XX                                   | \*/\*                                      |

## revokeToken

Revokes a M2M Token.

This endpoint can be authenticated by either a Machine Secret Key or by a Clerk Secret Key.

- When revoking a M2M Token with a Machine Secret Key, the token must managed by the Machine associated with the Machine Secret Key.
- When revoking a M2M Token with a Clerk Secret Key, any token on the Instance can be revoked.

### Example Usage

<!-- UsageSnippet language="php" operationID="revokeM2MToken" method="post" path="/m2m_tokens/{m2m_token_id}/revoke" -->
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

$requestBody = new Operations\RevokeM2MTokenRequestBody();

$response = $sdk->m2m->revokeToken(
    m2mTokenId: '<id>',
    requestBody: $requestBody

);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                    | Type                                                                                         | Required                                                                                     | Description                                                                                  |
| -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- |
| `m2mTokenId`                                                                                 | *string*                                                                                     | :heavy_check_mark:                                                                           | N/A                                                                                          |
| `requestBody`                                                                                | [Operations\RevokeM2MTokenRequestBody](../../Models/Operations/RevokeM2MTokenRequestBody.md) | :heavy_check_mark:                                                                           | N/A                                                                                          |

### Response

**[?Operations\RevokeM2MTokenResponse](../../Models/Operations/RevokeM2MTokenResponse.md)**

### Errors

| Error Type                           | Status Code                          | Content Type                         |
| ------------------------------------ | ------------------------------------ | ------------------------------------ |
| Errors\RevokeM2MTokenResponseBody    | 400                                  | application/json                     |
| Errors\RevokeM2MTokenM2mResponseBody | 404                                  | application/json                     |
| Errors\SDKException                  | 4XX, 5XX                             | \*/\*                                |

## verifyToken

Verifies a M2M Token.

This endpoint can be authenticated by either a Machine Secret Key or by a Clerk Secret Key.

- When verifying a M2M Token with a Machine Secret Key, the token must be granted access to the Machine associated with the Machine Secret Key.
- When verifying a M2M Token with a Clerk Secret Key, any token on the Instance can be verified.

### Example Usage

<!-- UsageSnippet language="php" operationID="verifyM2MToken" method="post" path="/m2m_tokens/verify" -->
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

$request = new Operations\VerifyM2MTokenRequestBody(
    token: '<value>',
);

$response = $sdk->m2m->verifyToken(
    request: $request
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                    | Type                                                                                         | Required                                                                                     | Description                                                                                  |
| -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- |
| `$request`                                                                                   | [Operations\VerifyM2MTokenRequestBody](../../Models/Operations/VerifyM2MTokenRequestBody.md) | :heavy_check_mark:                                                                           | The request object to use for the request.                                                   |

### Response

**[?Operations\VerifyM2MTokenResponse](../../Models/Operations/VerifyM2MTokenResponse.md)**

### Errors

| Error Type                           | Status Code                          | Content Type                         |
| ------------------------------------ | ------------------------------------ | ------------------------------------ |
| Errors\VerifyM2MTokenResponseBody    | 400                                  | application/json                     |
| Errors\VerifyM2MTokenM2mResponseBody | 404                                  | application/json                     |
| Errors\SDKException                  | 4XX, 5XX                             | \*/\*                                |
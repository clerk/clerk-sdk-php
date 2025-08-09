# OauthAccessTokens
(*oauthAccessTokens*)

## Overview

### Available Operations

* [verify](#verify) - Verify an OAuth Access Token

## verify

Verify an OAuth Access Token

### Example Usage

<!-- UsageSnippet language="php" operationID="verifyOAuthAccessToken" method="post" path="/oauth_applications/access_tokens/verify" -->
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

$request = new Operations\VerifyOAuthAccessTokenRequestBody(
    accessToken: 'XXXXXXXXXXXXXX',
);

$response = $sdk->oauthAccessTokens->verify(
    request: $request
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                    | Type                                                                                                         | Required                                                                                                     | Description                                                                                                  |
| ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                   | [Operations\VerifyOAuthAccessTokenRequestBody](../../Models/Operations/VerifyOAuthAccessTokenRequestBody.md) | :heavy_check_mark:                                                                                           | The request object to use for the request.                                                                   |

### Response

**[?Operations\VerifyOAuthAccessTokenResponse](../../Models/Operations/VerifyOAuthAccessTokenResponse.md)**

### Errors

| Error Type                                                 | Status Code                                                | Content Type                                               |
| ---------------------------------------------------------- | ---------------------------------------------------------- | ---------------------------------------------------------- |
| Errors\VerifyOAuthAccessTokenResponseBody                  | 400                                                        | application/json                                           |
| Errors\VerifyOAuthAccessTokenOauthAccessTokensResponseBody | 404                                                        | application/json                                           |
| Errors\SDKException                                        | 4XX, 5XX                                                   | \*/\*                                                      |
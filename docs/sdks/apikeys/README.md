# APIKeys

## Overview

Endpoints for managing API Keys

### Available Operations

* [createApiKey](#createapikey) - Create an API Key
* [getApiKeys](#getapikeys) - Get API Keys
* [getApiKey](#getapikey) - Get an API Key by ID
* [updateApiKey](#updateapikey) - Update an API Key
* [deleteApiKey](#deleteapikey) - Delete an API Key
* [getApiKeySecret](#getapikeysecret) - Get an API Key Secret
* [revokeApiKey](#revokeapikey) - Revoke an API Key
* [verifyApiKey](#verifyapikey) - Verify an API Key

## createApiKey

Create an API Key

### Example Usage

<!-- UsageSnippet language="php" operationID="createApiKey" method="post" path="/api_keys" -->
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

$request = new Operations\CreateApiKeyRequestBody(
    name: '<value>',
    subject: '<value>',
);

$response = $sdk->apiKeys->createApiKey(
    request: $request
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                | Type                                                                                     | Required                                                                                 | Description                                                                              |
| ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- |
| `$request`                                                                               | [Operations\CreateApiKeyRequestBody](../../Models/Operations/CreateApiKeyRequestBody.md) | :heavy_check_mark:                                                                       | The request object to use for the request.                                               |

### Response

**[?Operations\CreateApiKeyResponse](../../Models/Operations/CreateApiKeyResponse.md)**

### Errors

| Error Type                             | Status Code                            | Content Type                           |
| -------------------------------------- | -------------------------------------- | -------------------------------------- |
| Errors\CreateApiKeyResponseBody        | 400                                    | application/json                       |
| Errors\CreateAPIKeyAPIKeysResponseBody | 409                                    | application/json                       |
| Errors\SDKException                    | 4XX, 5XX                               | \*/\*                                  |

## getApiKeys

Get API Keys

### Example Usage

<!-- UsageSnippet language="php" operationID="getApiKeys" method="get" path="/api_keys" -->
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

$request = new Operations\GetApiKeysRequest(
    subject: '<value>',
);

$response = $sdk->apiKeys->getApiKeys(
    request: $request
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                    | Type                                                                         | Required                                                                     | Description                                                                  |
| ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- |
| `$request`                                                                   | [Operations\GetApiKeysRequest](../../Models/Operations/GetApiKeysRequest.md) | :heavy_check_mark:                                                           | The request object to use for the request.                                   |

### Response

**[?Operations\GetApiKeysResponse](../../Models/Operations/GetApiKeysResponse.md)**

### Errors

| Error Type                           | Status Code                          | Content Type                         |
| ------------------------------------ | ------------------------------------ | ------------------------------------ |
| Errors\GetApiKeysResponseBody        | 400                                  | application/json                     |
| Errors\GetAPIKeysAPIKeysResponseBody | 404                                  | application/json                     |
| Errors\SDKException                  | 4XX, 5XX                             | \*/\*                                |

## getApiKey

Get an API Key by ID

### Example Usage

<!-- UsageSnippet language="php" operationID="getApiKey" method="get" path="/api_keys/{apiKeyID}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->apiKeys->getApiKey(
    apiKeyID: '<id>'
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter          | Type               | Required           | Description        |
| ------------------ | ------------------ | ------------------ | ------------------ |
| `apiKeyID`         | *string*           | :heavy_check_mark: | N/A                |

### Response

**[?Operations\GetApiKeyResponse](../../Models/Operations/GetApiKeyResponse.md)**

### Errors

| Error Type                          | Status Code                         | Content Type                        |
| ----------------------------------- | ----------------------------------- | ----------------------------------- |
| Errors\GetApiKeyResponseBody        | 400                                 | application/json                    |
| Errors\GetAPIKeyAPIKeysResponseBody | 404                                 | application/json                    |
| Errors\SDKException                 | 4XX, 5XX                            | \*/\*                               |

## updateApiKey

Update an API Key

### Example Usage

<!-- UsageSnippet language="php" operationID="updateApiKey" method="patch" path="/api_keys/{apiKeyID}" -->
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

$requestBody = new Operations\UpdateApiKeyRequestBody();

$response = $sdk->apiKeys->updateApiKey(
    apiKeyID: '<id>',
    requestBody: $requestBody

);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                | Type                                                                                     | Required                                                                                 | Description                                                                              |
| ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- |
| `apiKeyID`                                                                               | *string*                                                                                 | :heavy_check_mark:                                                                       | N/A                                                                                      |
| `requestBody`                                                                            | [Operations\UpdateApiKeyRequestBody](../../Models/Operations/UpdateApiKeyRequestBody.md) | :heavy_check_mark:                                                                       | N/A                                                                                      |

### Response

**[?Operations\UpdateApiKeyResponse](../../Models/Operations/UpdateApiKeyResponse.md)**

### Errors

| Error Type                             | Status Code                            | Content Type                           |
| -------------------------------------- | -------------------------------------- | -------------------------------------- |
| Errors\UpdateApiKeyResponseBody        | 400                                    | application/json                       |
| Errors\UpdateAPIKeyAPIKeysResponseBody | 404                                    | application/json                       |
| Errors\SDKException                    | 4XX, 5XX                               | \*/\*                                  |

## deleteApiKey

Delete an API Key

### Example Usage

<!-- UsageSnippet language="php" operationID="deleteApiKey" method="delete" path="/api_keys/{apiKeyID}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->apiKeys->deleteApiKey(
    apiKeyID: '<id>'
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter          | Type               | Required           | Description        |
| ------------------ | ------------------ | ------------------ | ------------------ |
| `apiKeyID`         | *string*           | :heavy_check_mark: | N/A                |

### Response

**[?Operations\DeleteApiKeyResponse](../../Models/Operations/DeleteApiKeyResponse.md)**

### Errors

| Error Type                             | Status Code                            | Content Type                           |
| -------------------------------------- | -------------------------------------- | -------------------------------------- |
| Errors\DeleteApiKeyResponseBody        | 400                                    | application/json                       |
| Errors\DeleteAPIKeyAPIKeysResponseBody | 404                                    | application/json                       |
| Errors\SDKException                    | 4XX, 5XX                               | \*/\*                                  |

## getApiKeySecret

Get an API Key Secret

### Example Usage

<!-- UsageSnippet language="php" operationID="getApiKeySecret" method="get" path="/api_keys/{apiKeyID}/secret" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->apiKeys->getApiKeySecret(
    apiKeyID: '<id>'
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter          | Type               | Required           | Description        |
| ------------------ | ------------------ | ------------------ | ------------------ |
| `apiKeyID`         | *string*           | :heavy_check_mark: | N/A                |

### Response

**[?Operations\GetApiKeySecretResponse](../../Models/Operations/GetApiKeySecretResponse.md)**

### Errors

| Error Type                                | Status Code                               | Content Type                              |
| ----------------------------------------- | ----------------------------------------- | ----------------------------------------- |
| Errors\GetApiKeySecretResponseBody        | 400                                       | application/json                          |
| Errors\GetAPIKeySecretAPIKeysResponseBody | 404                                       | application/json                          |
| Errors\SDKException                       | 4XX, 5XX                                  | \*/\*                                     |

## revokeApiKey

Revoke an API Key

### Example Usage

<!-- UsageSnippet language="php" operationID="revokeApiKey" method="post" path="/api_keys/{apiKeyID}/revoke" -->
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

$requestBody = new Operations\RevokeApiKeyRequestBody();

$response = $sdk->apiKeys->revokeApiKey(
    apiKeyID: '<id>',
    requestBody: $requestBody

);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                | Type                                                                                     | Required                                                                                 | Description                                                                              |
| ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- |
| `apiKeyID`                                                                               | *string*                                                                                 | :heavy_check_mark:                                                                       | N/A                                                                                      |
| `requestBody`                                                                            | [Operations\RevokeApiKeyRequestBody](../../Models/Operations/RevokeApiKeyRequestBody.md) | :heavy_check_mark:                                                                       | N/A                                                                                      |

### Response

**[?Operations\RevokeApiKeyResponse](../../Models/Operations/RevokeApiKeyResponse.md)**

### Errors

| Error Type                             | Status Code                            | Content Type                           |
| -------------------------------------- | -------------------------------------- | -------------------------------------- |
| Errors\RevokeApiKeyResponseBody        | 400                                    | application/json                       |
| Errors\RevokeAPIKeyAPIKeysResponseBody | 404                                    | application/json                       |
| Errors\SDKException                    | 4XX, 5XX                               | \*/\*                                  |

## verifyApiKey

Verify an API Key

### Example Usage

<!-- UsageSnippet language="php" operationID="verifyApiKey" method="post" path="/api_keys/verify" -->
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

$request = new Operations\VerifyApiKeyRequestBody(
    secret: '<value>',
);

$response = $sdk->apiKeys->verifyApiKey(
    request: $request
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                | Type                                                                                     | Required                                                                                 | Description                                                                              |
| ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- |
| `$request`                                                                               | [Operations\VerifyApiKeyRequestBody](../../Models/Operations/VerifyApiKeyRequestBody.md) | :heavy_check_mark:                                                                       | The request object to use for the request.                                               |

### Response

**[?Operations\VerifyApiKeyResponse](../../Models/Operations/VerifyApiKeyResponse.md)**

### Errors

| Error Type                             | Status Code                            | Content Type                           |
| -------------------------------------- | -------------------------------------- | -------------------------------------- |
| Errors\VerifyApiKeyResponseBody        | 400                                    | application/json                       |
| Errors\VerifyAPIKeyAPIKeysResponseBody | 404                                    | application/json                       |
| Errors\SDKException                    | 4XX, 5XX                               | \*/\*                                  |
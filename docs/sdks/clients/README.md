# Clients
(*clients*)

## Overview

The Client object tracks sessions, as well as the state of any sign in and sign up attempts, for a given device.
<https://clerk.com/docs/reference/clerkjs/client>

### Available Operations

* [get](#get) - Get a client
* [~~list~~](#list) - List all clients :warning: **Deprecated**
* [verify](#verify) - Verify a client

## get

Returns the details of a client.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->clients->get(
    clientId: '<id>'
);

if ($response->client !== null) {
    // handle response
}
```

### Parameters

| Parameter          | Type               | Required           | Description        |
| ------------------ | ------------------ | ------------------ | ------------------ |
| `clientId`         | *string*           | :heavy_check_mark: | Client ID.         |

### Response

**[?Operations\GetClientResponse](../../Models/Operations/GetClientResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## ~~list~~

Returns a list of all clients. The clients are returned sorted by creation date,
with the newest clients appearing first.
Warning: the endpoint is being deprecated and will be removed in future versions.

> :warning: **DEPRECATED**: This will be removed in a future release, please migrate away from it as soon as possible.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->clients->list(
    limit: 10,
    offset: 0

);

if ($response->clientList !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                 | Type                                                                                                                                      | Required                                                                                                                                  | Description                                                                                                                               |
| ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- |
| `limit`                                                                                                                                   | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Applies a limit to the number of results returned.<br/>Can be used for paginating the results together with `offset`.                     |
| `offset`                                                                                                                                  | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Skip the first `offset` results when paginating.<br/>Needs to be an integer greater or equal to zero.<br/>To be used in conjunction with `limit`. |

### Response

**[?Operations\GetClientListResponse](../../Models/Operations/GetClientListResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 410, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## verify

Verifies the client in the provided token

### Example Usage

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

$request = new Operations\VerifyClientRequestBody();

$response = $sdk->clients->verify(
    request: $request
);

if ($response->client !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                | Type                                                                                     | Required                                                                                 | Description                                                                              |
| ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------- |
| `$request`                                                                               | [Operations\VerifyClientRequestBody](../../Models/Operations/VerifyClientRequestBody.md) | :heavy_check_mark:                                                                       | The request object to use for the request.                                               |

### Response

**[?Operations\VerifyClientResponse](../../Models/Operations/VerifyClientResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
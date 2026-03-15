# EnterpriseConnections

## Overview

### Available Operations

* [list](#list) - List enterprise connections
* [create](#create) - Create an enterprise connection
* [get](#get) - Retrieve an enterprise connection
* [update](#update) - Update an enterprise connection
* [delete](#delete) - Delete an enterprise connection

## list

Returns the list of enterprise connections for the instance.
Results can be paginated using the optional `limit` and `offset` query parameters.

### Example Usage

<!-- UsageSnippet language="php" operationID="ListEnterpriseConnections" method="get" path="/enterprise_connections" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->enterpriseConnections->list(
    limit: 10,
    offset: 0

);

if ($response->enterpriseConnections !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                           | Type                                                                                                                                                                | Required                                                                                                                                                            | Description                                                                                                                                                         |
| ------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `limit`                                                                                                                                                             | *?int*                                                                                                                                                              | :heavy_minus_sign:                                                                                                                                                  | Applies a limit to the number of results returned.<br/>Can be used for paginating the results together with `offset`.                                               |
| `offset`                                                                                                                                                            | *?int*                                                                                                                                                              | :heavy_minus_sign:                                                                                                                                                  | Skip the first `offset` results when paginating.<br/>Needs to be an integer greater or equal to zero.<br/>To be used in conjunction with `limit`.                   |
| `organizationId`                                                                                                                                                    | *?string*                                                                                                                                                           | :heavy_minus_sign:                                                                                                                                                  | Filter enterprise connections by organization ID                                                                                                                    |
| `active`                                                                                                                                                            | *?bool*                                                                                                                                                             | :heavy_minus_sign:                                                                                                                                                  | Filter by active status. If true, only active connections are returned. If false, only inactive connections are returned. If omitted, all connections are returned. |

### Response

**[?Operations\ListEnterpriseConnectionsResponse](../../Models/Operations/ListEnterpriseConnectionsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 402, 403, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## create

Create a new enterprise connection.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateEnterpriseConnection" method="post" path="/enterprise_connections" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->enterpriseConnections->create(
    request: $request
);

if ($response->schemasEnterpriseConnection !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                            | Type                                                                                                                 | Required                                                                                                             | Description                                                                                                          |
| -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                           | [Operations\CreateEnterpriseConnectionRequestBody](../../Models/Operations/CreateEnterpriseConnectionRequestBody.md) | :heavy_check_mark:                                                                                                   | The request object to use for the request.                                                                           |

### Response

**[?Operations\CreateEnterpriseConnectionResponse](../../Models/Operations/CreateEnterpriseConnectionResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 402, 403, 404, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## get

Fetches the enterprise connection whose ID matches the provided `enterprise_connection_id` in the path.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetEnterpriseConnection" method="get" path="/enterprise_connections/{enterprise_connection_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->enterpriseConnections->get(
    enterpriseConnectionId: '<id>'
);

if ($response->schemasEnterpriseConnection !== null) {
    // handle response
}
```

### Parameters

| Parameter                           | Type                                | Required                            | Description                         |
| ----------------------------------- | ----------------------------------- | ----------------------------------- | ----------------------------------- |
| `enterpriseConnectionId`            | *string*                            | :heavy_check_mark:                  | The ID of the enterprise connection |

### Response

**[?Operations\GetEnterpriseConnectionResponse](../../Models/Operations/GetEnterpriseConnectionResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 402, 403, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## update

Updates the enterprise connection whose ID matches the provided `enterprise_connection_id` in the path.
When enabling the connection (setting `active` to true), any existing verified organization domains that match the connection's domains (e.g. used for enrollment modes like automatic invitation) may be deleted so the connection can be enabled.

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateEnterpriseConnection" method="patch" path="/enterprise_connections/{enterprise_connection_id}" -->
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

$requestBody = new Operations\UpdateEnterpriseConnectionRequestBody();

$response = $sdk->enterpriseConnections->update(
    enterpriseConnectionId: '<id>',
    requestBody: $requestBody

);

if ($response->schemasEnterpriseConnection !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                            | Type                                                                                                                 | Required                                                                                                             | Description                                                                                                          |
| -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `enterpriseConnectionId`                                                                                             | *string*                                                                                                             | :heavy_check_mark:                                                                                                   | The ID of the enterprise connection to update                                                                        |
| `requestBody`                                                                                                        | [Operations\UpdateEnterpriseConnectionRequestBody](../../Models/Operations/UpdateEnterpriseConnectionRequestBody.md) | :heavy_check_mark:                                                                                                   | N/A                                                                                                                  |

### Response

**[?Operations\UpdateEnterpriseConnectionResponse](../../Models/Operations/UpdateEnterpriseConnectionResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 402, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## delete

Deletes the enterprise connection whose ID matches the provided `enterprise_connection_id` in the path.

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteEnterpriseConnection" method="delete" path="/enterprise_connections/{enterprise_connection_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->enterpriseConnections->delete(
    enterpriseConnectionId: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                                     | Type                                          | Required                                      | Description                                   |
| --------------------------------------------- | --------------------------------------------- | --------------------------------------------- | --------------------------------------------- |
| `enterpriseConnectionId`                      | *string*                                      | :heavy_check_mark:                            | The ID of the enterprise connection to delete |

### Response

**[?Operations\DeleteEnterpriseConnectionResponse](../../Models/Operations/DeleteEnterpriseConnectionResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 402, 403, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
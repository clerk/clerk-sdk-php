# SamlConnections
(*samlConnections*)

## Overview

### Available Operations

* [list](#list) - Get a list of SAML Connections for an instance
* [create](#create) - Create a SAML Connection
* [get](#get) - Retrieve a SAML Connection by ID
* [update](#update) - Update a SAML Connection
* [delete](#delete) - Delete a SAML Connection

## list

Returns the list of SAML Connections for an instance.
Results can be paginated using the optional `limit` and `offset` query parameters.
The SAML Connections are ordered by descending creation date and the most recent will be returned first.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



$response = $sdk->samlConnections->list(
    limit: 10,
    offset: 0

);

if ($response->samlConnections !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                 | Type                                                                                                                                      | Required                                                                                                                                  | Description                                                                                                                               |
| ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- |
| `limit`                                                                                                                                   | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Applies a limit to the number of results returned.<br/>Can be used for paginating the results together with `offset`.                     |
| `offset`                                                                                                                                  | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Skip the first `offset` results when paginating.<br/>Needs to be an integer greater or equal to zero.<br/>To be used in conjunction with `limit`. |

### Response

**[?Operations\ListSAMLConnectionsResponse](../../Models/Operations/ListSAMLConnectionsResponse.md)**

### Errors

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors99 | 402, 403, 422        | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |

## create

Create a new SAML Connection.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();

$request = new Operations\CreateSAMLConnectionRequestBody(
    name: '<value>',
    domain: 'low-packaging.info',
    provider: Operations\Provider::SamlCustom,
);

$response = $sdk->samlConnections->create(
    request: $request
);

if ($response->schemasSAMLConnection !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                | Type                                                                                                     | Required                                                                                                 | Description                                                                                              |
| -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                               | [Operations\CreateSAMLConnectionRequestBody](../../Models/Operations/CreateSAMLConnectionRequestBody.md) | :heavy_check_mark:                                                                                       | The request object to use for the request.                                                               |

### Response

**[?Operations\CreateSAMLConnectionResponse](../../Models/Operations/CreateSAMLConnectionResponse.md)**

### Errors

| Error Type            | Status Code           | Content Type          |
| --------------------- | --------------------- | --------------------- |
| Errors\ClerkErrors100 | 402, 403, 422         | application/json      |
| Errors\SDKException   | 4XX, 5XX              | \*/\*                 |

## get

Fetches the SAML Connection whose ID matches the provided `saml_connection_id` in the path.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



$response = $sdk->samlConnections->get(
    samlConnectionId: '<id>'
);

if ($response->schemasSAMLConnection !== null) {
    // handle response
}
```

### Parameters

| Parameter                     | Type                          | Required                      | Description                   |
| ----------------------------- | ----------------------------- | ----------------------------- | ----------------------------- |
| `samlConnectionId`            | *string*                      | :heavy_check_mark:            | The ID of the SAML Connection |

### Response

**[?Operations\GetSAMLConnectionResponse](../../Models/Operations/GetSAMLConnectionResponse.md)**

### Errors

| Error Type            | Status Code           | Content Type          |
| --------------------- | --------------------- | --------------------- |
| Errors\ClerkErrors101 | 402, 403, 404         | application/json      |
| Errors\SDKException   | 4XX, 5XX              | \*/\*                 |

## update

Updates the SAML Connection whose ID matches the provided `id` in the path.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();

$requestBody = new Operations\UpdateSAMLConnectionRequestBody();

$response = $sdk->samlConnections->update(
    samlConnectionId: '<id>',
    requestBody: $requestBody

);

if ($response->schemasSAMLConnection !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                | Type                                                                                                     | Required                                                                                                 | Description                                                                                              |
| -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- |
| `samlConnectionId`                                                                                       | *string*                                                                                                 | :heavy_check_mark:                                                                                       | The ID of the SAML Connection to update                                                                  |
| `requestBody`                                                                                            | [Operations\UpdateSAMLConnectionRequestBody](../../Models/Operations/UpdateSAMLConnectionRequestBody.md) | :heavy_check_mark:                                                                                       | N/A                                                                                                      |

### Response

**[?Operations\UpdateSAMLConnectionResponse](../../Models/Operations/UpdateSAMLConnectionResponse.md)**

### Errors

| Error Type            | Status Code           | Content Type          |
| --------------------- | --------------------- | --------------------- |
| Errors\ClerkErrors102 | 402, 403, 404, 422    | application/json      |
| Errors\SDKException   | 4XX, 5XX              | \*/\*                 |

## delete

Deletes the SAML Connection whose ID matches the provided `id` in the path.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



$response = $sdk->samlConnections->delete(
    samlConnectionId: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                               | Type                                    | Required                                | Description                             |
| --------------------------------------- | --------------------------------------- | --------------------------------------- | --------------------------------------- |
| `samlConnectionId`                      | *string*                                | :heavy_check_mark:                      | The ID of the SAML Connection to delete |

### Response

**[?Operations\DeleteSAMLConnectionResponse](../../Models/Operations/DeleteSAMLConnectionResponse.md)**

### Errors

| Error Type            | Status Code           | Content Type          |
| --------------------- | --------------------- | --------------------- |
| Errors\ClerkErrors103 | 402, 403, 404         | application/json      |
| Errors\SDKException   | 4XX, 5XX              | \*/\*                 |
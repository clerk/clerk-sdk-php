# EmailAddresses
(*emailAddresses*)

## Overview

### Available Operations

* [create](#create) - Create an email address
* [get](#get) - Retrieve an email address
* [delete](#delete) - Delete an email address
* [update](#update) - Update an email address

## create

Create a new email address

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();

$request = new Operations\CreateEmailAddressRequestBody();

$response = $sdk->emailAddresses->create(
    request: $request
);

if ($response->emailAddress !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                            | Type                                                                                                 | Required                                                                                             | Description                                                                                          |
| ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- |
| `$request`                                                                                           | [Operations\CreateEmailAddressRequestBody](../../Models/Operations/CreateEmailAddressRequestBody.md) | :heavy_check_mark:                                                                                   | The request object to use for the request.                                                           |

### Response

**[?Operations\CreateEmailAddressResponse](../../Models/Operations/CreateEmailAddressResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors3     | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## get

Returns the details of an email address.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



$response = $sdk->emailAddresses->get(
    emailAddressId: '<id>'
);

if ($response->emailAddress !== null) {
    // handle response
}
```

### Parameters

| Parameter                               | Type                                    | Required                                | Description                             |
| --------------------------------------- | --------------------------------------- | --------------------------------------- | --------------------------------------- |
| `emailAddressId`                        | *string*                                | :heavy_check_mark:                      | The ID of the email address to retrieve |

### Response

**[?Operations\GetEmailAddressResponse](../../Models/Operations/GetEmailAddressResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors4 | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## delete

Delete the email address with the given ID

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



$response = $sdk->emailAddresses->delete(
    emailAddressId: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                             | Type                                  | Required                              | Description                           |
| ------------------------------------- | ------------------------------------- | ------------------------------------- | ------------------------------------- |
| `emailAddressId`                      | *string*                              | :heavy_check_mark:                    | The ID of the email address to delete |

### Response

**[?Operations\DeleteEmailAddressResponse](../../Models/Operations/DeleteEmailAddressResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors5 | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## update

Updates an email address.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();

$requestBody = new Operations\UpdateEmailAddressRequestBody();

$response = $sdk->emailAddresses->update(
    emailAddressId: '<id>',
    requestBody: $requestBody

);

if ($response->emailAddress !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                             | Type                                                                                                  | Required                                                                                              | Description                                                                                           |
| ----------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------- |
| `emailAddressId`                                                                                      | *string*                                                                                              | :heavy_check_mark:                                                                                    | The ID of the email address to update                                                                 |
| `requestBody`                                                                                         | [?Operations\UpdateEmailAddressRequestBody](../../Models/Operations/UpdateEmailAddressRequestBody.md) | :heavy_minus_sign:                                                                                    | N/A                                                                                                   |

### Response

**[?Operations\UpdateEmailAddressResponse](../../Models/Operations/UpdateEmailAddressResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors6 | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
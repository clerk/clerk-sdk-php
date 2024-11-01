# PhoneNumbers
(*phoneNumbers*)

## Overview

### Available Operations

* [create](#create) - Create a phone number
* [get](#get) - Retrieve a phone number
* [delete](#delete) - Delete a phone number
* [update](#update) - Update a phone number

## create

Create a new phone number

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();

$request = new Operations\CreatePhoneNumberRequestBody();

$response = $sdk->phoneNumbers->create(
    request: $request
);

if ($response->phoneNumber !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                          | Type                                                                                               | Required                                                                                           | Description                                                                                        |
| -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- |
| `$request`                                                                                         | [Operations\CreatePhoneNumberRequestBody](../../Models/Operations/CreatePhoneNumberRequestBody.md) | :heavy_check_mark:                                                                                 | The request object to use for the request.                                                         |

### Response

**[?Operations\CreatePhoneNumberResponse](../../Models/Operations/CreatePhoneNumberResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors7     | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## get

Returns the details of a phone number

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



$response = $sdk->phoneNumbers->get(
    phoneNumberId: '<id>'
);

if ($response->phoneNumber !== null) {
    // handle response
}
```

### Parameters

| Parameter                              | Type                                   | Required                               | Description                            |
| -------------------------------------- | -------------------------------------- | -------------------------------------- | -------------------------------------- |
| `phoneNumberId`                        | *string*                               | :heavy_check_mark:                     | The ID of the phone number to retrieve |

### Response

**[?Operations\GetPhoneNumberResponse](../../Models/Operations/GetPhoneNumberResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors8 | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## delete

Delete the phone number with the given ID

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



$response = $sdk->phoneNumbers->delete(
    phoneNumberId: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                            | Type                                 | Required                             | Description                          |
| ------------------------------------ | ------------------------------------ | ------------------------------------ | ------------------------------------ |
| `phoneNumberId`                      | *string*                             | :heavy_check_mark:                   | The ID of the phone number to delete |

### Response

**[?Operations\DeletePhoneNumberResponse](../../Models/Operations/DeletePhoneNumberResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors9 | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## update

Updates a phone number

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();

$requestBody = new Operations\UpdatePhoneNumberRequestBody();

$response = $sdk->phoneNumbers->update(
    phoneNumberId: '<id>',
    requestBody: $requestBody

);

if ($response->phoneNumber !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                           | Type                                                                                                | Required                                                                                            | Description                                                                                         |
| --------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------- |
| `phoneNumberId`                                                                                     | *string*                                                                                            | :heavy_check_mark:                                                                                  | The ID of the phone number to update                                                                |
| `requestBody`                                                                                       | [?Operations\UpdatePhoneNumberRequestBody](../../Models/Operations/UpdatePhoneNumberRequestBody.md) | :heavy_minus_sign:                                                                                  | N/A                                                                                                 |

### Response

**[?Operations\UpdatePhoneNumberResponse](../../Models/Operations/UpdatePhoneNumberResponse.md)**

### Errors

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors10 | 400, 401, 403, 404   | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |
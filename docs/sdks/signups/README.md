# SignUps
(*signUps*)

## Overview

### Available Operations

* [update](#update) - Update a sign-up

## update

Update the sign-up with the given ID

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

$requestBody = new Operations\UpdateSignUpRequestBody();

$response = $sdk->signUps->update(
    id: '<id>',
    requestBody: $requestBody

);

if ($response->signUp !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                 | Type                                                                                      | Required                                                                                  | Description                                                                               |
| ----------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------- |
| `id`                                                                                      | *string*                                                                                  | :heavy_check_mark:                                                                        | The ID of the sign-up to update                                                           |
| `requestBody`                                                                             | [?Operations\UpdateSignUpRequestBody](../../Models/Operations/UpdateSignUpRequestBody.md) | :heavy_minus_sign:                                                                        | N/A                                                                                       |

### Response

**[?Operations\UpdateSignUpResponse](../../Models/Operations/UpdateSignUpResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 403                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
# PhoneNumbers

## Overview

### Available Operations

* [create](#create) - Create a phone number
* [get](#get) - Retrieve a phone number
* [delete](#delete) - Delete a phone number
* [update](#update) - Update a phone number
* [prepareVerification](#prepareverification) - Send a verification code to a phone number
* [attemptVerification](#attemptverification) - Verify a code sent to a phone number
* [replaceForUser](#replaceforuser) - Replace a user's phone number

## create

Create a new phone number

### Example Usage

<!-- UsageSnippet language="php" operationID="CreatePhoneNumber" method="post" path="/phone_numbers" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



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
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## get

Returns the details of a phone number

### Example Usage

<!-- UsageSnippet language="php" operationID="GetPhoneNumber" method="get" path="/phone_numbers/{phone_number_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



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
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## delete

Delete the phone number with the given ID

### Example Usage

<!-- UsageSnippet language="php" operationID="DeletePhoneNumber" method="delete" path="/phone_numbers/{phone_number_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



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
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## update

Updates a phone number

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdatePhoneNumber" method="patch" path="/phone_numbers/{phone_number_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



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

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## prepareVerification

Sends a one-time code to the given phone number so that a backend can
verify the user controls it (for example, in a custom, backend-driven
sign-in flow). The code is tracked on its own verification; confirm it
with attempt_verification.

### Example Usage

<!-- UsageSnippet language="php" operationID="PreparePhoneNumberVerification" method="post" path="/phone_numbers/{phone_number_id}/prepare_verification" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->phoneNumbers->prepareVerification(
    phoneNumberId: '<id>'
);

if ($response->verificationResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                   | Type                                                        | Required                                                    | Description                                                 |
| ----------------------------------------------------------- | ----------------------------------------------------------- | ----------------------------------------------------------- | ----------------------------------------------------------- |
| `phoneNumberId`                                             | *string*                                                    | :heavy_check_mark:                                          | The ID of the phone number to send the verification code to |

### Response

**[?Operations\PreparePhoneNumberVerificationResponse](../../Models/Operations/PreparePhoneNumberVerificationResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 429 | application/json        |
| Errors\ClerkErrors      | 500                     | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## attemptVerification

Checks a one-time code against the verification identified by
verification_id, and returns the verification with its updated status
(`verified`, `unverified`, `expired`, or `failed`) and attempt count, so a
backend driving its own frontend can react on every attempt — an incorrect
or expired code is reported through the status, not as an error. Resubmitting
a verification whose code was already accepted is rejected with a
`verification_already_verified` error. If the code
is correct and the phone number is not already verified, it is also marked
as verified as a side effect (just as it would be in a frontend verification
flow); an already verified phone number is left unchanged. It never creates
a session; to sign the user in afterwards, mint a sign-in token.

### Example Usage

<!-- UsageSnippet language="php" operationID="AttemptPhoneNumberVerification" method="post" path="/phone_numbers/{phone_number_id}/attempt_verification" -->
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

$requestBody = new Operations\AttemptPhoneNumberVerificationRequestBody(
    verificationId: '<id>',
    code: '<value>',
);

$response = $sdk->phoneNumbers->attemptVerification(
    phoneNumberId: '<id>',
    requestBody: $requestBody

);

if ($response->verificationResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                    | Type                                                                                                                         | Required                                                                                                                     | Description                                                                                                                  |
| ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- |
| `phoneNumberId`                                                                                                              | *string*                                                                                                                     | :heavy_check_mark:                                                                                                           | The ID of the phone number whose code is being verified                                                                      |
| `requestBody`                                                                                                                | [Operations\AttemptPhoneNumberVerificationRequestBody](../../Models/Operations/AttemptPhoneNumberVerificationRequestBody.md) | :heavy_check_mark:                                                                                                           | N/A                                                                                                                          |

### Response

**[?Operations\AttemptPhoneNumberVerificationResponse](../../Models/Operations/AttemptPhoneNumberVerificationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\ClerkErrors  | 500                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## replaceForUser

Replaces all of the user's phone numbers with a single primary phone number.
By default the new phone number is created verified, with the admin verification strategy.
When `identification_status` is `reserved` it is created reserved instead: unverified but usable
for sign-in and locked so no other user can claim it. The new phone number is never reserved for
second factor. Any existing phone numbers are deleted; replacing a phone number that is reserved
for second factor disables the user's MFA.

### Example Usage

<!-- UsageSnippet language="php" operationID="ReplaceUserPhoneNumber" method="put" path="/users/{user_id}/phone_number" -->
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

$requestBody = new Operations\ReplaceUserPhoneNumberRequestBody(
    phoneNumber: '1-440-484-8878 x689',
);

$response = $sdk->phoneNumbers->replaceForUser(
    userId: '<id>',
    requestBody: $requestBody

);

if ($response->phoneNumber !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                    | Type                                                                                                         | Required                                                                                                     | Description                                                                                                  |
| ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ |
| `userId`                                                                                                     | *string*                                                                                                     | :heavy_check_mark:                                                                                           | The ID of the user whose phone number to replace                                                             |
| `requestBody`                                                                                                | [Operations\ReplaceUserPhoneNumberRequestBody](../../Models/Operations/ReplaceUserPhoneNumberRequestBody.md) | :heavy_check_mark:                                                                                           | N/A                                                                                                          |

### Response

**[?Operations\ReplaceUserPhoneNumberResponse](../../Models/Operations/ReplaceUserPhoneNumberResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |
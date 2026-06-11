# EmailAddresses

## Overview

### Available Operations

* [create](#create) - Create an email address
* [get](#get) - Retrieve an email address
* [delete](#delete) - Delete an email address
* [update](#update) - Update an email address
* [prepareVerification](#prepareverification) - Send a verification code to an email address
* [attemptVerification](#attemptverification) - Verify a code sent to an email address
* [replaceForUser](#replaceforuser) - Replace a user's email address

## create

Create a new email address

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateEmailAddress" method="post" path="/email_addresses" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



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

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\ClerkErrors           | 400, 401, 403, 404, 409, 422 | application/json             |
| Errors\SDKException          | 4XX, 5XX                     | \*/\*                        |

## get

Returns the details of an email address.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetEmailAddress" method="get" path="/email_addresses/{email_address_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



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
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## delete

Delete the email address with the given ID

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteEmailAddress" method="delete" path="/email_addresses/{email_address_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



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

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 409 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## update

Updates an email address.

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateEmailAddress" method="patch" path="/email_addresses/{email_address_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



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

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 409 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## prepareVerification

Sends a one-time code to the given email address so that a backend can
verify the user controls it (for example, in a custom, backend-driven
sign-in flow). The code is tracked on its own verification; confirm it
with attempt_verification.

### Example Usage

<!-- UsageSnippet language="php" operationID="PrepareEmailAddressVerification" method="post" path="/email_addresses/{email_address_id}/prepare_verification" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->emailAddresses->prepareVerification(
    emailAddressId: '<id>'
);

if ($response->verificationResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                    | Type                                                         | Required                                                     | Description                                                  |
| ------------------------------------------------------------ | ------------------------------------------------------------ | ------------------------------------------------------------ | ------------------------------------------------------------ |
| `emailAddressId`                                             | *string*                                                     | :heavy_check_mark:                                           | The ID of the email address to send the verification code to |

### Response

**[?Operations\PrepareEmailAddressVerificationResponse](../../Models/Operations/PrepareEmailAddressVerificationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\ClerkErrors  | 500                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## attemptVerification

Checks a one-time code against the verification identified by
verification_id, and returns the verification with its updated status
(`verified`, `unverified`, `expired`, or `failed`) and attempt count, so a
backend driving its own frontend can react on every attempt — an incorrect
or expired code is reported through the status, not as an error. Resubmitting
a verification whose code was already accepted is rejected with a
`verification_already_verified` error. If the code
is correct and the email address is not already verified, it is also marked
as verified as a side effect (just as it would be in a frontend verification
flow); an already verified email address is left unchanged. It never creates
a session; to sign the user in afterwards, mint a sign-in token.

### Example Usage

<!-- UsageSnippet language="php" operationID="AttemptEmailAddressVerification" method="post" path="/email_addresses/{email_address_id}/attempt_verification" -->
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

$requestBody = new Operations\AttemptEmailAddressVerificationRequestBody(
    verificationId: '<id>',
    code: '<value>',
);

$response = $sdk->emailAddresses->attemptVerification(
    emailAddressId: '<id>',
    requestBody: $requestBody

);

if ($response->verificationResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                      | Type                                                                                                                           | Required                                                                                                                       | Description                                                                                                                    |
| ------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------ |
| `emailAddressId`                                                                                                               | *string*                                                                                                                       | :heavy_check_mark:                                                                                                             | The ID of the email address whose code is being verified                                                                       |
| `requestBody`                                                                                                                  | [Operations\AttemptEmailAddressVerificationRequestBody](../../Models/Operations/AttemptEmailAddressVerificationRequestBody.md) | :heavy_check_mark:                                                                                                             | N/A                                                                                                                            |

### Response

**[?Operations\AttemptEmailAddressVerificationResponse](../../Models/Operations/AttemptEmailAddressVerificationResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\ClerkErrors  | 500                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## replaceForUser

Replaces all of the user's email addresses with a single primary email address.
By default the new email address is created verified, with the admin verification strategy.
When `identification_status` is `reserved` it is created reserved instead: unverified but usable
for sign-in and locked so no other user can claim it. Any existing email addresses are deleted.
If an existing email address is linked to a connected account, the request is rejected; remove
the connected account first.

### Example Usage

<!-- UsageSnippet language="php" operationID="ReplaceUserEmailAddress" method="put" path="/users/{user_id}/email_address" -->
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

$requestBody = new Operations\ReplaceUserEmailAddressRequestBody(
    emailAddress: 'Ines83@gmail.com',
);

$response = $sdk->emailAddresses->replaceForUser(
    userId: '<id>',
    requestBody: $requestBody

);

if ($response->emailAddress !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                      | Type                                                                                                           | Required                                                                                                       | Description                                                                                                    |
| -------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------- |
| `userId`                                                                                                       | *string*                                                                                                       | :heavy_check_mark:                                                                                             | The ID of the user whose email address to replace                                                              |
| `requestBody`                                                                                                  | [Operations\ReplaceUserEmailAddressRequestBody](../../Models/Operations/ReplaceUserEmailAddressRequestBody.md) | :heavy_check_mark:                                                                                             | N/A                                                                                                            |

### Response

**[?Operations\ReplaceUserEmailAddressResponse](../../Models/Operations/ReplaceUserEmailAddressResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |
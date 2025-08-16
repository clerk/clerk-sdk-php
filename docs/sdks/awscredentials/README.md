# AwsCredentials
(*awsCredentials*)

## Overview

### Available Operations

* [delete](#delete) - Delete an AWS Credential
* [update](#update) - Update an AWS Credential

## delete

Delete the AWS Credential with the given ID

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteAWSCredential" method="delete" path="/aws_credentials/{id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->awsCredentials->delete(
    id: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                              | Type                                   | Required                               | Description                            |
| -------------------------------------- | -------------------------------------- | -------------------------------------- | -------------------------------------- |
| `id`                                   | *string*                               | :heavy_check_mark:                     | The ID of the AWS Credential to delete |

### Response

**[?Operations\DeleteAWSCredentialResponse](../../Models/Operations/DeleteAWSCredentialResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## update

Updates an AWS credential.

### Example Usage

<!-- UsageSnippet language="php" operationID="UpdateAWSCredential" method="patch" path="/aws_credentials/{id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->awsCredentials->update(
    id: '<id>',
    requestBody: $requestBody

);

if ($response->awsCredential !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                               | Type                                                                                                    | Required                                                                                                | Description                                                                                             |
| ------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- |
| `id`                                                                                                    | *string*                                                                                                | :heavy_check_mark:                                                                                      | The ID of the AWS Credential to update                                                                  |
| `requestBody`                                                                                           | [?Operations\UpdateAWSCredentialRequestBody](../../Models/Operations/UpdateAWSCredentialRequestBody.md) | :heavy_minus_sign:                                                                                      | N/A                                                                                                     |

### Response

**[?Operations\UpdateAWSCredentialResponse](../../Models/Operations/UpdateAWSCredentialResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
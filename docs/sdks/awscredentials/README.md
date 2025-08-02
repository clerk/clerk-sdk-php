# AwsCredentials
(*awsCredentials*)

## Overview

### Available Operations

* [list](#list) - List all AWS Credentials
* [create](#create) - Create an AWS Credential
* [get](#get) - Retrieve an AWS Credential
* [delete](#delete) - Delete an AWS Credential
* [update](#update) - Update an AWS Credential

## list

Returns a list of all AWS Credentials.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetAWSCredentialList" method="get" path="/aws_credentials" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->awsCredentials->list(

);

if ($response->awsCredentialList !== null) {
    // handle response
}
```

### Response

**[?Operations\GetAWSCredentialListResponse](../../Models/Operations/GetAWSCredentialListResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## create

Create a new AWS Credential

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateAWSCredential" method="post" path="/aws_credentials" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->awsCredentials->create(
    request: $request
);

if ($response->awsCredential !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                              | Type                                                                                                   | Required                                                                                               | Description                                                                                            |
| ------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                             | [Operations\CreateAWSCredentialRequestBody](../../Models/Operations/CreateAWSCredentialRequestBody.md) | :heavy_check_mark:                                                                                     | The request object to use for the request.                                                             |

### Response

**[?Operations\CreateAWSCredentialResponse](../../Models/Operations/CreateAWSCredentialResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## get

Returns the details of an AWS Credential.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetAWSCredential" method="get" path="/aws_credentials/{id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->awsCredentials->get(
    id: '<id>'
);

if ($response->awsCredential !== null) {
    // handle response
}
```

### Parameters

| Parameter                                | Type                                     | Required                                 | Description                              |
| ---------------------------------------- | ---------------------------------------- | ---------------------------------------- | ---------------------------------------- |
| `id`                                     | *string*                                 | :heavy_check_mark:                       | The ID of the AWS Credential to retrieve |

### Response

**[?Operations\GetAWSCredentialResponse](../../Models/Operations/GetAWSCredentialResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 403, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

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
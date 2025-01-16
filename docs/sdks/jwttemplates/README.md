# JwtTemplates
(*jwtTemplates*)

## Overview

### Available Operations

* [create](#create) - Create a JWT template
* [delete](#delete) - Delete a Template
* [get](#get) - Retrieve a template
* [list](#list) - List all templates
* [update](#update) - Update a JWT template

## create

Create a new JWT template

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

$request = new Operations\CreateJWTTemplateRequestBody();

$response = $sdk->jwtTemplates->create(
    request: $request
);

if ($response->jwtTemplate !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                          | Type                                                                                               | Required                                                                                           | Description                                                                                        |
| -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------- |
| `$request`                                                                                         | [Operations\CreateJWTTemplateRequestBody](../../Models/Operations/CreateJWTTemplateRequestBody.md) | :heavy_check_mark:                                                                                 | The request object to use for the request.                                                         |

### Response

**[?Operations\CreateJWTTemplateResponse](../../Models/Operations/CreateJWTTemplateResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 402, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## delete

Delete a Template

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



$response = $sdk->jwtTemplates->delete(
    templateId: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter          | Type               | Required           | Description        |
| ------------------ | ------------------ | ------------------ | ------------------ |
| `templateId`       | *string*           | :heavy_check_mark: | JWT Template ID    |

### Response

**[?Operations\DeleteJWTTemplateResponse](../../Models/Operations/DeleteJWTTemplateResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 403, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## get

Retrieve the details of a given JWT template

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



$response = $sdk->jwtTemplates->get(
    templateId: '<id>'
);

if ($response->jwtTemplate !== null) {
    // handle response
}
```

### Parameters

| Parameter          | Type               | Required           | Description        |
| ------------------ | ------------------ | ------------------ | ------------------ |
| `templateId`       | *string*           | :heavy_check_mark: | JWT Template ID    |

### Response

**[?Operations\GetJWTTemplateResponse](../../Models/Operations/GetJWTTemplateResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 404                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## list

List all templates

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



$response = $sdk->jwtTemplates->list(

);

if ($response->jwtTemplateList !== null) {
    // handle response
}
```

### Response

**[?Operations\ListJWTTemplatesResponse](../../Models/Operations/ListJWTTemplatesResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## update

Updates an existing JWT template

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

$requestBody = new Operations\UpdateJWTTemplateRequestBody();

$response = $sdk->jwtTemplates->update(
    templateId: '<id>',
    requestBody: $requestBody

);

if ($response->jwtTemplate !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                           | Type                                                                                                | Required                                                                                            | Description                                                                                         |
| --------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------- |
| `templateId`                                                                                        | *string*                                                                                            | :heavy_check_mark:                                                                                  | The ID of the JWT template to update                                                                |
| `requestBody`                                                                                       | [?Operations\UpdateJWTTemplateRequestBody](../../Models/Operations/UpdateJWTTemplateRequestBody.md) | :heavy_minus_sign:                                                                                  | N/A                                                                                                 |

### Response

**[?Operations\UpdateJWTTemplateResponse](../../Models/Operations/UpdateJWTTemplateResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 402, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
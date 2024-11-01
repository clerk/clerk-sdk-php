# JwtTemplates
(*jwtTemplates*)

## Overview

### Available Operations

* [list](#list) - List all templates
* [create](#create) - Create a JWT template
* [get](#get) - Retrieve a template
* [update](#update) - Update a JWT template
* [delete](#delete) - Delete a Template

## list

List all templates

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



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

## create

Create a new JWT template

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();

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

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors63 | 400, 402, 422        | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |

## get

Retrieve the details of a given JWT template

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



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

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors64 | 404                  | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |

## update

Updates an existing JWT template

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();

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

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors65 | 400, 402, 422        | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |

## delete

Delete a Template

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



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

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors66 | 403, 404             | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |
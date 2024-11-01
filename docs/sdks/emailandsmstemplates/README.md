# EmailAndSmsTemplates
(*emailAndSmsTemplates*)

## Overview

### Available Operations

* [~~upsert~~](#upsert) - Update a template for a given type and slug :warning: **Deprecated**

## ~~upsert~~

Updates the existing template of the given type and slug

> :warning: **DEPRECATED**: This will be removed in a future release, please migrate away from it as soon as possible.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();

$requestBody = new Operations\UpsertTemplateRequestBody();

$response = $sdk->emailAndSmsTemplates->upsert(
    templateType: Operations\UpsertTemplatePathParamTemplateType::Sms,
    slug: '<value>',
    requestBody: $requestBody

);

if ($response->template !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                        | Type                                                                                                             | Required                                                                                                         | Description                                                                                                      |
| ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- |
| `templateType`                                                                                                   | [Operations\UpsertTemplatePathParamTemplateType](../../Models/Operations/UpsertTemplatePathParamTemplateType.md) | :heavy_check_mark:                                                                                               | The type of template to update                                                                                   |
| `slug`                                                                                                           | *string*                                                                                                         | :heavy_check_mark:                                                                                               | The slug of the template to update                                                                               |
| `requestBody`                                                                                                    | [?Operations\UpsertTemplateRequestBody](../../Models/Operations/UpsertTemplateRequestBody.md)                    | :heavy_minus_sign:                                                                                               | N/A                                                                                                              |

### Response

**[?Operations\UpsertTemplateResponse](../../Models/Operations/UpsertTemplateResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\ClerkErrors18         | 400, 401, 402, 403, 404, 422 | application/json             |
| Errors\SDKException          | 4XX, 5XX                     | \*/\*                        |
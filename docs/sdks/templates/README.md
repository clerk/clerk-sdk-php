# Templates
(*templates*)

## Overview

### Available Operations

* [~~preview~~](#preview) - Preview changes to a template :warning: **Deprecated**

## ~~preview~~

Returns a preview of a template for a given template_type, slug and body

> :warning: **DEPRECATED**: This will be removed in a future release, please migrate away from it as soon as possible.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();

$requestBody = new Operations\PreviewTemplateRequestBody();

$response = $sdk->templates->preview(
    templateType: '<value>',
    slug: '<value>',
    requestBody: $requestBody

);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                       | Type                                                                                            | Required                                                                                        | Description                                                                                     |
| ----------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------- |
| `templateType`                                                                                  | *string*                                                                                        | :heavy_check_mark:                                                                              | The type of template to preview                                                                 |
| `slug`                                                                                          | *string*                                                                                        | :heavy_check_mark:                                                                              | The slug of the template to preview                                                             |
| `requestBody`                                                                                   | [?Operations\PreviewTemplateRequestBody](../../Models/Operations/PreviewTemplateRequestBody.md) | :heavy_minus_sign:                                                                              | Required parameters                                                                             |

### Response

**[?Operations\PreviewTemplateResponse](../../Models/Operations/PreviewTemplateResponse.md)**

### Errors

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors20 | 400, 401, 404, 422   | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |
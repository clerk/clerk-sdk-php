# EmailSMSTemplates
(*emailSMSTemplates*)

## Overview

### Available Operations

* [~~get~~](#get) - Retrieve a template :warning: **Deprecated**
* [~~list~~](#list) - List all templates :warning: **Deprecated**
* [~~revert~~](#revert) - Revert a template :warning: **Deprecated**
* [~~toggleTemplateDelivery~~](#toggletemplatedelivery) - Toggle the delivery by Clerk for a template of a given type and slug :warning: **Deprecated**

## ~~get~~

Returns the details of a template

> :warning: **DEPRECATED**: This will be removed in a future release, please migrate away from it as soon as possible.

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



$response = $sdk->emailSMSTemplates->get(
    templateType: Operations\PathParamTemplateType::Sms,
    slug: '<value>'

);

if ($response->template !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                            | Type                                                                                 | Required                                                                             | Description                                                                          |
| ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ |
| `templateType`                                                                       | [Operations\PathParamTemplateType](../../Models/Operations/PathParamTemplateType.md) | :heavy_check_mark:                                                                   | The type of templates to retrieve (email or SMS)                                     |
| `slug`                                                                               | *string*                                                                             | :heavy_check_mark:                                                                   | The slug (i.e. machine-friendly name) of the template to retrieve                    |

### Response

**[?Operations\GetTemplateResponse](../../Models/Operations/GetTemplateResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## ~~list~~

Returns a list of all templates.
The templates are returned sorted by position.

> :warning: **DEPRECATED**: This will be removed in a future release, please migrate away from it as soon as possible.

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



$response = $sdk->emailSMSTemplates->list(
    templateType: Operations\TemplateType::Sms
);

if ($response->templateList !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                          | Type                                                               | Required                                                           | Description                                                        |
| ------------------------------------------------------------------ | ------------------------------------------------------------------ | ------------------------------------------------------------------ | ------------------------------------------------------------------ |
| `templateType`                                                     | [Operations\TemplateType](../../Models/Operations/TemplateType.md) | :heavy_check_mark:                                                 | The type of templates to list (email or SMS)                       |

### Response

**[?Operations\GetTemplateListResponse](../../Models/Operations/GetTemplateListResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## ~~revert~~

Reverts an updated template to its default state

> :warning: **DEPRECATED**: This will be removed in a future release, please migrate away from it as soon as possible.

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



$response = $sdk->emailSMSTemplates->revert(
    templateType: Operations\RevertTemplatePathParamTemplateType::Email,
    slug: '<value>'

);

if ($response->template !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                        | Type                                                                                                             | Required                                                                                                         | Description                                                                                                      |
| ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- |
| `templateType`                                                                                                   | [Operations\RevertTemplatePathParamTemplateType](../../Models/Operations/RevertTemplatePathParamTemplateType.md) | :heavy_check_mark:                                                                                               | The type of template to revert                                                                                   |
| `slug`                                                                                                           | *string*                                                                                                         | :heavy_check_mark:                                                                                               | The slug of the template to revert                                                                               |

### Response

**[?Operations\RevertTemplateResponse](../../Models/Operations/RevertTemplateResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 402, 404  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## ~~toggleTemplateDelivery~~

Toggles the delivery by Clerk for a template of a given type and slug.
If disabled, Clerk will not deliver the resulting email or SMS.
The app developer will need to listen to the `email.created` or `sms.created` webhooks in order to handle delivery themselves.

> :warning: **DEPRECATED**: This will be removed in a future release, please migrate away from it as soon as possible.

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

$requestBody = new Operations\ToggleTemplateDeliveryRequestBody();

$response = $sdk->emailSMSTemplates->toggleTemplateDelivery(
    templateType: Operations\ToggleTemplateDeliveryPathParamTemplateType::Sms,
    slug: '<value>',
    requestBody: $requestBody

);

if ($response->template !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                        | Type                                                                                                                             | Required                                                                                                                         | Description                                                                                                                      |
| -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- |
| `templateType`                                                                                                                   | [Operations\ToggleTemplateDeliveryPathParamTemplateType](../../Models/Operations/ToggleTemplateDeliveryPathParamTemplateType.md) | :heavy_check_mark:                                                                                                               | The type of template to toggle delivery for                                                                                      |
| `slug`                                                                                                                           | *string*                                                                                                                         | :heavy_check_mark:                                                                                                               | The slug of the template for which to toggle delivery                                                                            |
| `requestBody`                                                                                                                    | [?Operations\ToggleTemplateDeliveryRequestBody](../../Models/Operations/ToggleTemplateDeliveryRequestBody.md)                    | :heavy_minus_sign:                                                                                                               | N/A                                                                                                                              |

### Response

**[?Operations\ToggleTemplateDeliveryResponse](../../Models/Operations/ToggleTemplateDeliveryResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
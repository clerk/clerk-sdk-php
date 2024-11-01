# Webhooks
(*webhooks*)

## Overview

You can configure webhooks to be notified about various events that happen on your instance.
<https://clerk.com/docs/integration/webhooks>

### Available Operations

* [createSvixApp](#createsvixapp) - Create a Svix app
* [deleteSvixApp](#deletesvixapp) - Delete a Svix app
* [generateSvixAuthURL](#generatesvixauthurl) - Create a Svix Dashboard URL

## createSvixApp

Create a Svix app and associate it with the current instance

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



$response = $sdk->webhooks->createSvixApp(

);

if ($response->svixURL !== null) {
    // handle response
}
```

### Response

**[?Operations\CreateSvixAppResponse](../../Models/Operations/CreateSvixAppResponse.md)**

### Errors

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors62 | 400                  | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |

## deleteSvixApp

Delete a Svix app and disassociate it from the current instance

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



$response = $sdk->webhooks->deleteSvixApp(

);

if ($response->statusCode === 200) {
    // handle response
}
```

### Response

**[?Operations\DeleteSvixAppResponse](../../Models/Operations/DeleteSvixAppResponse.md)**

### Errors

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors63 | 400                  | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |

## generateSvixAuthURL

Generate a new url for accessing the Svix's management dashboard for that particular instance

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



$response = $sdk->webhooks->generateSvixAuthURL(

);

if ($response->svixURL !== null) {
    // handle response
}
```

### Response

**[?Operations\GenerateSvixAuthURLResponse](../../Models/Operations/GenerateSvixAuthURLResponse.md)**

### Errors

| Error Type           | Status Code          | Content Type         |
| -------------------- | -------------------- | -------------------- |
| Errors\ClerkErrors63 | 400                  | application/json     |
| Errors\SDKException  | 4XX, 5XX             | \*/\*                |
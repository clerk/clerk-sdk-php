# RedirectURLs
(*redirectURLs*)

## Overview

### Available Operations

* [list](#list) - List all redirect URLs

## list

Lists all whitelisted redirect_urls for the instance

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



$response = $sdk->redirectURLs->list(

);

if ($response->redirectURLList !== null) {
    // handle response
}
```

### Response

**[?Operations\ListRedirectURLsResponse](../../Models/Operations/ListRedirectURLsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
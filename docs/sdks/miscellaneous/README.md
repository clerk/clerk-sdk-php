# Miscellaneous
(*miscellaneous*)

## Overview

Various endpoints that do not belong in any particular category.

### Available Operations

* [getInterstitial](#getinterstitial) - Returns the markup for the interstitial page

## getInterstitial

The Clerk interstitial endpoint serves an html page that loads clerk.js in order to check the user's authentication state.
It is used by Clerk SDKs when the user's authentication state cannot be immediately determined.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()->build();



$response = $sdk->miscellaneous->getInterstitial(
    frontendApi: '<value>',
    publishableKey: '<value>'

);

if ($response->statusCode === 200) {
    // handle response
}
```

### Parameters

| Parameter                             | Type                                  | Required                              | Description                           |
| ------------------------------------- | ------------------------------------- | ------------------------------------- | ------------------------------------- |
| `frontendApi`                         | *?string*                             | :heavy_minus_sign:                    | The Frontend API key of your instance |
| `publishableKey`                      | *?string*                             | :heavy_minus_sign:                    | The publishable key of your instance  |

### Response

**[?Operations\GetPublicInterstitialResponse](../../Models/Operations/GetPublicInterstitialResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
# Commerce
(*commerce*)

## Overview

### Available Operations

* [listPlans](#listplans) - List all commerce plans
* [listSubscriptionItems](#listsubscriptionitems) - List all subscription items
* [cancelSubscriptionItem](#cancelsubscriptionitem) - Cancel a subscription item
* [extendSubscriptionItemFreeTrial](#extendsubscriptionitemfreetrial) - Extend free trial for a subscription item

## listPlans

Returns a list of all commerce plans for the instance. The plans are returned sorted by creation date,
with the newest plans appearing first. This includes both free and paid plans. Pagination is supported.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetCommercePlanList" method="get" path="/commerce/plans" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->commerce->listPlans(
    limit: 10,
    offset: 0

);

if ($response->paginatedCommercePlanResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                 | Type                                                                                                                                      | Required                                                                                                                                  | Description                                                                                                                               |
| ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------- |
| `paginated`                                                                                                                               | *?bool*                                                                                                                                   | :heavy_minus_sign:                                                                                                                        | Whether to paginate the results.<br/>If true, the results will be paginated.<br/>If false, the results will not be paginated.             |
| `limit`                                                                                                                                   | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Applies a limit to the number of results returned.<br/>Can be used for paginating the results together with `offset`.                     |
| `offset`                                                                                                                                  | *?int*                                                                                                                                    | :heavy_minus_sign:                                                                                                                        | Skip the first `offset` results when paginating.<br/>Needs to be an integer greater or equal to zero.<br/>To be used in conjunction with `limit`. |
| `payerType`                                                                                                                               | [?Operations\PayerType](../../Models/Operations/PayerType.md)                                                                             | :heavy_minus_sign:                                                                                                                        | Filter plans by payer type                                                                                                                |

### Response

**[?Operations\GetCommercePlanListResponse](../../Models/Operations/GetCommercePlanListResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 422       | application/json    |
| Errors\ClerkErrors  | 500                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## listSubscriptionItems

Returns a list of all subscription items for the instance. The subscription items are returned sorted by creation date,
with the newest appearing first. This includes subscriptions for both users and organizations. Pagination is supported.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetCommerceSubscriptionItemList" method="get" path="/commerce/subscription_items" -->
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

$request = new Operations\GetCommerceSubscriptionItemListRequest();

$response = $sdk->commerce->listSubscriptionItems(
    request: $request
);

if ($response->paginatedCommerceSubscriptionItemResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                              | Type                                                                                                                   | Required                                                                                                               | Description                                                                                                            |
| ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                             | [Operations\GetCommerceSubscriptionItemListRequest](../../Models/Operations/GetCommerceSubscriptionItemListRequest.md) | :heavy_check_mark:                                                                                                     | The request object to use for the request.                                                                             |

### Response

**[?Operations\GetCommerceSubscriptionItemListResponse](../../Models/Operations/GetCommerceSubscriptionItemListResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 422       | application/json    |
| Errors\ClerkErrors  | 500                 | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## cancelSubscriptionItem

Cancel a specific subscription item. The subscription item can be canceled immediately or at the end of the current billing period.

### Example Usage

<!-- UsageSnippet language="php" operationID="CancelCommerceSubscriptionItem" method="delete" path="/commerce/subscription_items/{subscription_item_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->commerce->cancelSubscriptionItem(
    subscriptionItemId: '<id>',
    endNow: false

);

if ($response->commerceSubscriptionItem !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                          | Type                                                                                                               | Required                                                                                                           | Description                                                                                                        |
| ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ |
| `subscriptionItemId`                                                                                               | *string*                                                                                                           | :heavy_check_mark:                                                                                                 | The ID of the subscription item to cancel                                                                          |
| `endNow`                                                                                                           | *?bool*                                                                                                            | :heavy_minus_sign:                                                                                                 | Whether to cancel the subscription immediately (true) or at the end of the current billing period (false, default) |

### Response

**[?Operations\CancelCommerceSubscriptionItemResponse](../../Models/Operations/CancelCommerceSubscriptionItemResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\ClerkErrors      | 500                     | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |

## extendSubscriptionItemFreeTrial

Extends the free trial period for a specific subscription item to the specified timestamp.
The subscription item must be currently in a free trial period, and the plan must support free trials.
The timestamp must be in the future and not more than 365 days from the end of the current trial period
This operation is idempotent - repeated requests with the same timestamp will not change the trial period.

### Example Usage

<!-- UsageSnippet language="php" operationID="ExtendCommerceSubscriptionItemFreeTrial" method="post" path="/billing/subscription_items/{subscription_item_id}/extend_free_trial" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Components;
use Clerk\Backend\Utils;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();

$extendFreeTrialRequest = new Components\ExtendFreeTrialRequest(
    extendTo: Utils\Utils::parseDateTime('2026-01-08T00:00:00Z'),
);

$response = $sdk->commerce->extendSubscriptionItemFreeTrial(
    subscriptionItemId: '<id>',
    extendFreeTrialRequest: $extendFreeTrialRequest

);

if ($response->commerceSubscriptionItem !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                              | Type                                                                                   | Required                                                                               | Description                                                                            |
| -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- |
| `subscriptionItemId`                                                                   | *string*                                                                               | :heavy_check_mark:                                                                     | The ID of the subscription item to extend the free trial for                           |
| `extendFreeTrialRequest`                                                               | [Components\ExtendFreeTrialRequest](../../Models/Components/ExtendFreeTrialRequest.md) | :heavy_check_mark:                                                                     | Parameters for extending the free trial                                                |

### Response

**[?Operations\ExtendCommerceSubscriptionItemFreeTrialResponse](../../Models/Operations/ExtendCommerceSubscriptionItemFreeTrialResponse.md)**

### Errors

| Error Type              | Status Code             | Content Type            |
| ----------------------- | ----------------------- | ----------------------- |
| Errors\ClerkErrors      | 400, 401, 403, 404, 422 | application/json        |
| Errors\ClerkErrors      | 500                     | application/json        |
| Errors\SDKException     | 4XX, 5XX                | \*/\*                   |
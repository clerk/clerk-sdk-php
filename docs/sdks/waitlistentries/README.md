# WaitlistEntries

## Overview

### Available Operations

* [list](#list) - List all waitlist entries
* [create](#create) - Create a waitlist entry
* [bulkCreate](#bulkcreate) - Create multiple waitlist entries
* [delete](#delete) - Delete a pending waitlist entry
* [invite](#invite) - Invite a waitlist entry
* [reject](#reject) - Reject a waitlist entry

## list

Retrieve a list of waitlist entries for the instance.
Entries are ordered by creation date in descending order by default.
Supports filtering by email address or status and pagination with limit and offset parameters.

### Example Usage

<!-- UsageSnippet language="php" operationID="ListWaitlistEntries" method="get" path="/waitlist_entries" -->
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

$request = new Operations\ListWaitlistEntriesRequest();

$response = $sdk->waitlistEntries->list(
    request: $request
);

if ($response->waitlistEntries !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                      | Type                                                                                           | Required                                                                                       | Description                                                                                    |
| ---------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------- |
| `$request`                                                                                     | [Operations\ListWaitlistEntriesRequest](../../Models/Operations/ListWaitlistEntriesRequest.md) | :heavy_check_mark:                                                                             | The request object to use for the request.                                                     |

### Response

**[?Operations\ListWaitlistEntriesResponse](../../Models/Operations/ListWaitlistEntriesResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## create

Creates a new waitlist entry for the given email address.
If the email address is already on the waitlist, no new entry will be created and the existing waitlist entry will be returned.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateWaitlistEntry" method="post" path="/waitlist_entries" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->waitlistEntries->create(
    request: $request
);

if ($response->waitlistEntry !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                              | Type                                                                                                   | Required                                                                                               | Description                                                                                            |
| ------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                             | [Operations\CreateWaitlistEntryRequestBody](../../Models/Operations/CreateWaitlistEntryRequestBody.md) | :heavy_check_mark:                                                                                     | The request object to use for the request.                                                             |

### Response

**[?Operations\CreateWaitlistEntryResponse](../../Models/Operations/CreateWaitlistEntryResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 422            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## bulkCreate

Creates multiple waitlist entries for the provided email addresses.
You can choose whether to send confirmation emails by setting the `notify` parameter to `true` or `false` for each entry.
If the `notify` parameter is omitted, it defaults to `true`.

If an email address is already on the waitlist, no new entry will be created and the existing waitlist entry will be returned.
Duplicate email addresses within the same request are not allowed.

This endpoint is limited to a maximum of 50 entries per API call. If you need to add more entries, please make multiple requests.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateBulkWaitlistEntries" method="post" path="/waitlist_entries/bulk" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->waitlistEntries->bulkCreate(
    request: $request
);

if ($response->waitlistEntryList !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                           | Type                                                                | Required                                                            | Description                                                         |
| ------------------------------------------------------------------- | ------------------------------------------------------------------- | ------------------------------------------------------------------- | ------------------------------------------------------------------- |
| `$request`                                                          | [array<Operations\CreateBulkWaitlistEntriesRequestBody>](../../.md) | :heavy_check_mark:                                                  | The request object to use for the request.                          |

### Response

**[?Operations\CreateBulkWaitlistEntriesResponse](../../Models/Operations/CreateBulkWaitlistEntriesResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 422            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## delete

Delete a pending waitlist entry.

### Example Usage

<!-- UsageSnippet language="php" operationID="DeleteWaitlistEntry" method="delete" path="/waitlist_entries/{waitlist_entry_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->waitlistEntries->delete(
    waitlistEntryId: '<id>'
);

if ($response->deletedObject !== null) {
    // handle response
}
```

### Parameters

| Parameter                              | Type                                   | Required                               | Description                            |
| -------------------------------------- | -------------------------------------- | -------------------------------------- | -------------------------------------- |
| `waitlistEntryId`                      | *string*                               | :heavy_check_mark:                     | The ID of the waitlist entry to delete |

### Response

**[?Operations\DeleteWaitlistEntryResponse](../../Models/Operations/DeleteWaitlistEntryResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 404, 409, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## invite

Send an invite to the email address in a waitlist entry.

### Example Usage

<!-- UsageSnippet language="php" operationID="InviteWaitlistEntry" method="post" path="/waitlist_entries/{waitlist_entry_id}/invite" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->waitlistEntries->invite(
    waitlistEntryId: '<id>',
    requestBody: $requestBody

);

if ($response->waitlistEntry !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                               | Type                                                                                                    | Required                                                                                                | Description                                                                                             |
| ------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- |
| `waitlistEntryId`                                                                                       | *string*                                                                                                | :heavy_check_mark:                                                                                      | The ID of the waitlist entry to invite                                                                  |
| `requestBody`                                                                                           | [?Operations\InviteWaitlistEntryRequestBody](../../Models/Operations/InviteWaitlistEntryRequestBody.md) | :heavy_minus_sign:                                                                                      | N/A                                                                                                     |

### Response

**[?Operations\InviteWaitlistEntryResponse](../../Models/Operations/InviteWaitlistEntryResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 404, 409, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## reject

Reject a waitlist entry.

### Example Usage

<!-- UsageSnippet language="php" operationID="RejectWaitlistEntry" method="post" path="/waitlist_entries/{waitlist_entry_id}/reject" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->waitlistEntries->reject(
    waitlistEntryId: '<id>'
);

if ($response->waitlistEntry !== null) {
    // handle response
}
```

### Parameters

| Parameter                              | Type                                   | Required                               | Description                            |
| -------------------------------------- | -------------------------------------- | -------------------------------------- | -------------------------------------- |
| `waitlistEntryId`                      | *string*                               | :heavy_check_mark:                     | The ID of the waitlist entry to reject |

### Response

**[?Operations\RejectWaitlistEntryResponse](../../Models/Operations/RejectWaitlistEntryResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 404, 409, 422  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
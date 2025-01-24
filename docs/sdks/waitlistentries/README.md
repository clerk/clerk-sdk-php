# WaitlistEntries
(*waitlistEntries*)

## Overview

### Available Operations

* [createWaitlistEntry](#createwaitlistentry) - Create a waitlist entry
* [listWaitlistEntries](#listwaitlistentries) - List all waitlist entries

## createWaitlistEntry

Creates a new waitlist entry for the given email address.
If the email address is already on the waitlist, no new entry will be created and the existing waitlist entry will be returned.

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

$request = new Operations\CreateWaitlistEntryRequestBody(
    emailAddress: 'Demond_Willms@hotmail.com',
);

$response = $sdk->waitlistEntries->createWaitlistEntry(
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

## listWaitlistEntries

Retrieve a list of waitlist entries for the instance.
Entries are ordered by creation date in descending order by default.
Supports filtering by email address or status and pagination with limit and offset parameters.

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

$request = new Operations\ListWaitlistEntriesRequest();

$response = $sdk->waitlistEntries->listWaitlistEntries(
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
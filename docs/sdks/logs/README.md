# Logs

## Overview

### Available Operations

* [list](#list) - List all logs
* [getSchema](#getschema) - Retrieve the payload schema of a log event type
* [listGroupEvents](#listgroupevents) - List an event group's logs
* [get](#get) - Retrieve a single log

## list

Returns a list of logs for the authenticated instance.

Use it to find specific events, such as one user's failed sign-ins or
every event in a trace. Narrow the search with filters and a time range
(`event_time_after` and `event_time_before`), and stop paginating once
you have what you need. Syncing or exporting logs through this endpoint
isn't allowed; use log drains, part of the Enterprise plan, instead.

Results are paginated with cursors. The `next_page_status` field in the
cursor object says whether more results exist:
- `"true"`: more results are available. Pass `starting_after` to get the
  next page.
- `"unknown"`: to keep latency predictable, the server read only part of
  the time range, reported as `searched_from` and `searched_to`. More
  matches may exist in the rest of the range; pass `starting_after` to
  keep searching.
- `"false"`: no more results exist within the requested range.

Results never go back further than the plan's log retention.
`retention_floor` in the cursor object is the oldest timestamp the plan
can return. `retention_limit_reached` is `true` when `next_page_status`
is `"false"` because the search ended at that floor, either because
`event_time_after` asked for older events or because it was omitted.

### Example Usage

<!-- UsageSnippet language="php" operationID="ListLogs" method="get" path="/logs" -->
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

$request = new Operations\ListLogsRequest(
    userId: 'user_2abcDEF',
    identifier: 'ana@example.com',
    traceId: '1234567890abcdef1234567890abcdef',
    sessionId: 'sess_2abcDEF',
    eventTimeAfter: 1705315800000,
    eventTimeBefore: 1705319400000,
);

$response = $sdk->logs->list(
    request: $request
);

if ($response->logList !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                | Type                                                                     | Required                                                                 | Description                                                              |
| ------------------------------------------------------------------------ | ------------------------------------------------------------------------ | ------------------------------------------------------------------------ | ------------------------------------------------------------------------ |
| `$request`                                                               | [Operations\ListLogsRequest](../../Models/Operations/ListLogsRequest.md) | :heavy_check_mark:                                                       | The request object to use for the request.                               |

### Response

**[?Operations\ListLogsResponse](../../Models/Operations/ListLogsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403, 422, 429  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## getSchema

Returns the payload schema of a log event type: which fields its
payload carries, addressed by the dot-paths that the `payload_filter`
and `payload_fields` parameters of the list endpoint accept.

`type` accepts a concrete event type (`sign_in.completed`), a
trailing-`*` wildcard (`sign_in.*`), or a bare family name (`sign_in`,
normalized to `sign_in.*` when no concrete type matches — the
response's `event_type`
echoes the normalized form). For wildcard lookups the fields are the
intersection across every matching event type, and `matched_event_types`
lists what the intersection was computed over; per-type metadata
(description, severity, docs_group) is present only for concrete types.

The response is the same for every instance.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetLogSchema" method="get" path="/logs/schemas" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->logs->getSchema(
    type: 'sign_in.*'
);

if ($response->logSchema !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                 | Type                                                                                                                                                                                      | Required                                                                                                                                                                                  | Description                                                                                                                                                                               | Example                                                                                                                                                                                   |
| ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `type`                                                                                                                                                                                    | *string*                                                                                                                                                                                  | :heavy_check_mark:                                                                                                                                                                        | The event type to describe: concrete (`sign_in.completed`),<br/>trailing-`*` wildcard (`sign_in.*`), or bare family name<br/>(`sign_in`). Unknown types return a 422. A bare `*` is not<br/>accepted. | sign_in.*                                                                                                                                                                                 |

### Response

**[?Operations\GetLogSchemaResponse](../../Models/Operations/GetLogSchemaResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403, 422, 429  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## listGroupEvents

Returns the log entries of one event group past the ones a grouped
page of `GET /logs` includes, oldest first, for loading
more of a group. Accepts the same event filters as listing logs, so a
filtered page keeps loading only matching events.

### Example Usage

<!-- UsageSnippet language="php" operationID="ListLogGroupEvents" method="get" path="/logs/groups/{group_id}/events" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->logs->listGroupEvents(
    groupId: '<id>',
    startedAt: 797022,
    limit: 10

);

if ($response->logList !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                       | Type                                                                                                                                            | Required                                                                                                                                        | Description                                                                                                                                     |
| ----------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------- |
| `groupId`                                                                                                                                       | *string*                                                                                                                                        | :heavy_check_mark:                                                                                                                              | The ID of the event group, e.g. a sign-in ID.                                                                                                   |
| `startedAt`                                                                                                                                     | *int*                                                                                                                                           | :heavy_check_mark:                                                                                                                              | When the group started (Unix timestamp in milliseconds), the<br/>`started_at` of the group item. It bounds the time range searched.             |
| `limit`                                                                                                                                         | *?int*                                                                                                                                          | :heavy_minus_sign:                                                                                                                              | Applies a limit to the number of results returned.                                                                                              |
| `startingAfter`                                                                                                                                 | *?string*                                                                                                                                       | :heavy_minus_sign:                                                                                                                              | The group's `events_cursor` from the grouped view, or the<br/>`starting_after` cursor this endpoint returned. Only forward<br/>pagination is supported. |

### Response

**[?Operations\ListLogGroupEventsResponse](../../Models/Operations/ListLogGroupEventsResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403, 422, 429  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## get

Returns a single log entry by its composite key ({event_time_ms}:{event_id}).
Unlike the list endpoint, this returns the full payload for the event.

### Example Usage

<!-- UsageSnippet language="php" operationID="GetLog" method="get" path="/logs/{event_time_and_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->logs->get(
    eventTimeAndId: '1776207110588:019d8e31-a1bc-7e07-9347-0fd20b25c475'
);

if ($response->logWithPayload !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                  | Type                                                                                                                                                                                       | Required                                                                                                                                                                                   | Description                                                                                                                                                                                | Example                                                                                                                                                                                    |
| ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| `eventTimeAndId`                                                                                                                                                                           | *string*                                                                                                                                                                                   | :heavy_check_mark:                                                                                                                                                                         | Composite identifier in the format `{event_time_ms}:{event_id}`, where<br/>`event_time_ms` is the event timestamp as a Unix timestamp in milliseconds<br/>and `event_id` is the UUID of the event. | 1776207110588:019d8e31-a1bc-7e07-9347-0fd20b25c475                                                                                                                                         |

### Response

**[?Operations\GetLogResponse](../../Models/Operations/GetLogResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 401, 403, 404, 429  | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
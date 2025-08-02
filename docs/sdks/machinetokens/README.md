# MachineTokens
(*machineTokens*)

## Overview

### Available Operations

* [create](#create) - Create a machine token

## create

Create a new machine token

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateMachineToken" method="post" path="/machine_tokens" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->machineTokens->create(
    request: $request
);

if ($response->machineToken !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                            | Type                                                                                                 | Required                                                                                             | Description                                                                                          |
| ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- |
| `$request`                                                                                           | [Operations\CreateMachineTokenRequestBody](../../Models/Operations/CreateMachineTokenRequestBody.md) | :heavy_check_mark:                                                                                   | The request object to use for the request.                                                           |

### Response

**[?Operations\CreateMachineTokenResponse](../../Models/Operations/CreateMachineTokenResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 401, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
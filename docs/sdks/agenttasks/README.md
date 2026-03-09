# AgentTasks

## Overview

### Available Operations

* [create](#create) - Create agent task
* [revoke](#revoke) - Revoke agent task

## create

Create an agent task on behalf of a user.
The response contains a URL that, when visited, creates a session for the user.
The agent_id is stable per agent_name within an instance. The task_id is unique per call.

### Example Usage

<!-- UsageSnippet language="php" operationID="CreateAgentTask" method="post" path="/agents/tasks" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->agentTasks->create(
    request: $request
);

if ($response->agentTask !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                      | Type                                                                                           | Required                                                                                       | Description                                                                                    |
| ---------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------- |
| `$request`                                                                                     | [Operations\CreateAgentTaskRequestBody](../../Models/Operations/CreateAgentTaskRequestBody.md) | :heavy_check_mark:                                                                             | The request object to use for the request.                                                     |

### Response

**[?Operations\CreateAgentTaskResponse](../../Models/Operations/CreateAgentTaskResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 404, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## revoke

Revokes a pending agent task.

### Example Usage

<!-- UsageSnippet language="php" operationID="RevokeAgentTask" method="post" path="/agents/tasks/{agent_task_id}/revoke" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$sdk = Backend\ClerkBackend::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->agentTasks->revoke(
    agentTaskId: '<id>'
);

if ($response->agentTask !== null) {
    // handle response
}
```

### Parameters

| Parameter                               | Type                                    | Required                                | Description                             |
| --------------------------------------- | --------------------------------------- | --------------------------------------- | --------------------------------------- |
| `agentTaskId`                           | *string*                                | :heavy_check_mark:                      | The ID of the agent task to be revoked. |

### Response

**[?Operations\RevokeAgentTaskResponse](../../Models/Operations/RevokeAgentTaskResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
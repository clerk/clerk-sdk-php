# ActorTokens
(*actorTokens*)

## Overview

### Available Operations

* [create](#create) - Create actor token
* [revoke](#revoke) - Revoke actor token

## create

Create an actor token that can be used to impersonate the given user.
The `actor` parameter needs to include at least a "sub" key whose value is the ID of the actor (impersonating) user.

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

$request = new Operations\CreateActorTokenRequestBody(
    userId: '<id>',
    actor: new Operations\Actor(),
);

$response = $sdk->actorTokens->create(
    request: $request
);

if ($response->actorToken !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                        | Type                                                                                             | Required                                                                                         | Description                                                                                      |
| ------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------ |
| `$request`                                                                                       | [Operations\CreateActorTokenRequestBody](../../Models/Operations/CreateActorTokenRequestBody.md) | :heavy_check_mark:                                                                               | The request object to use for the request.                                                       |

### Response

**[?Operations\CreateActorTokenResponse](../../Models/Operations/CreateActorTokenResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 402, 422       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

## revoke

Revokes a pending actor token.

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



$response = $sdk->actorTokens->revoke(
    actorTokenId: '<id>'
);

if ($response->actorToken !== null) {
    // handle response
}
```

### Parameters

| Parameter                                | Type                                     | Required                                 | Description                              |
| ---------------------------------------- | ---------------------------------------- | ---------------------------------------- | ---------------------------------------- |
| `actorTokenId`                           | *string*                                 | :heavy_check_mark:                       | The ID of the actor token to be revoked. |

### Response

**[?Operations\RevokeActorTokenResponse](../../Models/Operations/RevokeActorTokenResponse.md)**

### Errors

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors  | 400, 404            | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |
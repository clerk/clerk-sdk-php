# SchemasPasskey


## Fields

| Field                                                                                                    | Type                                                                                                     | Required                                                                                                 | Description                                                                                              |
| -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- |
| `id`                                                                                                     | *?string*                                                                                                | :heavy_minus_sign:                                                                                       | N/A                                                                                                      |
| `object`                                                                                                 | [\Clerk\Backend\Models\Components\SchemasPasskeyObject](../../Models/Components/SchemasPasskeyObject.md) | :heavy_check_mark:                                                                                       | String representing the object's type. Objects of the same type share the same value.<br/>               |
| `name`                                                                                                   | *string*                                                                                                 | :heavy_check_mark:                                                                                       | N/A                                                                                                      |
| `lastUsedAt`                                                                                             | *int*                                                                                                    | :heavy_check_mark:                                                                                       | Unix timestamp of when the passkey was last used.<br/>                                                   |
| `verification`                                                                                           | *mixed*                                                                                                  | :heavy_check_mark:                                                                                       | N/A                                                                                                      |
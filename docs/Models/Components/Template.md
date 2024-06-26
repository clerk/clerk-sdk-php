# Template


## Fields

| Field                                                                                         | Type                                                                                          | Required                                                                                      | Description                                                                                   |
| --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- |
| `id`                                                                                          | *?string*                                                                                     | :heavy_minus_sign:                                                                            | N/A                                                                                           |
| `object`                                                                                      | [?\Clerk\Backend\Models\Components\TemplateObject](../../Models/Components/TemplateObject.md) | :heavy_minus_sign:                                                                            | String representing the object's type. Objects of the same type share the same value.<br/>    |
| `instanceId`                                                                                  | *?string*                                                                                     | :heavy_minus_sign:                                                                            | the id of the instance the template belongs to                                                |
| `resourceType`                                                                                | *?string*                                                                                     | :heavy_minus_sign:                                                                            | whether this is a system (default) or user overridden) template                               |
| `templateType`                                                                                | *?string*                                                                                     | :heavy_minus_sign:                                                                            | whether this is an email or SMS template                                                      |
| `name`                                                                                        | *?string*                                                                                     | :heavy_minus_sign:                                                                            | user-friendly name of the template                                                            |
| `slug`                                                                                        | *?string*                                                                                     | :heavy_minus_sign:                                                                            | machine-friendly name of the template                                                         |
| `position`                                                                                    | *?int*                                                                                        | :heavy_minus_sign:                                                                            | position with the listing of templates                                                        |
| `canRevert`                                                                                   | *?bool*                                                                                       | :heavy_minus_sign:                                                                            | whether this template can be reverted to the corresponding system default                     |
| `canDelete`                                                                                   | *?bool*                                                                                       | :heavy_minus_sign:                                                                            | whether this template can be deleted                                                          |
| `canToggle`                                                                                   | *?bool*                                                                                       | :heavy_minus_sign:                                                                            | whether this template can be enabled or disabled, true only for notification SMS templates    |
| `subject`                                                                                     | *?string*                                                                                     | :heavy_minus_sign:                                                                            | email subject                                                                                 |
| `markup`                                                                                      | *?string*                                                                                     | :heavy_minus_sign:                                                                            | the editor markup used to generate the body of the template                                   |
| `body`                                                                                        | *?string*                                                                                     | :heavy_minus_sign:                                                                            | the template body before variable interpolation                                               |
| `availableVariables`                                                                          | array<*string*>                                                                               | :heavy_minus_sign:                                                                            | list of variables that are available for use in the template body                             |
| `requiredVariables`                                                                           | array<*string*>                                                                               | :heavy_minus_sign:                                                                            | list of variables that must be contained in the template body                                 |
| `fromEmailName`                                                                               | *?string*                                                                                     | :heavy_minus_sign:                                                                            | N/A                                                                                           |
| `replyToEmailName`                                                                            | *?string*                                                                                     | :heavy_minus_sign:                                                                            | N/A                                                                                           |
| `deliveredByClerk`                                                                            | *?bool*                                                                                       | :heavy_minus_sign:                                                                            | N/A                                                                                           |
| `enabled`                                                                                     | *?bool*                                                                                       | :heavy_minus_sign:                                                                            | N/A                                                                                           |
| `updatedAt`                                                                                   | *?int*                                                                                        | :heavy_minus_sign:                                                                            | Unix timestamp of last update.<br/>                                                           |
| `createdAt`                                                                                   | *?int*                                                                                        | :heavy_minus_sign:                                                                            | Unix timestamp of creation.<br/>                                                              |
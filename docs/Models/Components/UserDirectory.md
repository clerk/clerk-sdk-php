# ~~UserDirectory~~

The most recently updated directory link. Use directories for all links.

> :warning: **DEPRECATED**: This will be removed in a future release, please migrate away from it as soon as possible.


## Fields

| Field                                                                           | Type                                                                            | Required                                                                        | Description                                                                     |
| ------------------------------------------------------------------------------- | ------------------------------------------------------------------------------- | ------------------------------------------------------------------------------- | ------------------------------------------------------------------------------- |
| `id`                                                                            | *string*                                                                        | :heavy_check_mark:                                                              | The user's resource ID in this directory.                                       |
| `directoryName`                                                                 | *string*                                                                        | :heavy_check_mark:                                                              | N/A                                                                             |
| `provider`                                                                      | *string*                                                                        | :heavy_check_mark:                                                              | N/A                                                                             |
| `enterpriseConnectionId`                                                        | *string*                                                                        | :heavy_check_mark:                                                              | N/A                                                                             |
| `groups`                                                                        | array<[Components\UserGroups](../../Models/Components/UserGroups.md)>           | :heavy_minus_sign:                                                              | Omitted when groups were not loaded; an empty array means no group memberships. |
| `directoryId`                                                                   | *string*                                                                        | :heavy_check_mark:                                                              | The ID of the directory the user is provisioned from.<br/>                      |
| `directoryEnabled`                                                              | *bool*                                                                          | :heavy_check_mark:                                                              | Whether the directory is currently enabled.<br/>                                |
| `externalId`                                                                    | *string*                                                                        | :heavy_check_mark:                                                              | The user's external ID as reported by the directory, if any.<br/>               |
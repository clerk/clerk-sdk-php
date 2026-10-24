# DirectoryGroup

A group reported by the identity provider for a directory.


## Fields

| Field                                                                                      | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `object`                                                                                   | [Components\DirectoryGroupObject](../../Models/Components/DirectoryGroupObject.md)         | :heavy_check_mark:                                                                         | String representing the object's type. Always "directory_group".                           |
| `id`                                                                                       | *string*                                                                                   | :heavy_check_mark:                                                                         | The group ID from the identity provider.                                                   |
| `displayName`                                                                              | *string*                                                                                   | :heavy_check_mark:                                                                         | The display name of the group.                                                             |
| `updatedAt`                                                                                | *int*                                                                                      | :heavy_check_mark:                                                                         | Unix timestamp (milliseconds) of when the group was last updated on the identity provider. |
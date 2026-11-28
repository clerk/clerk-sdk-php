# DirectoryGroupList

A cursor-paginated list of groups for a directory.


## Fields

| Field                                                                                      | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `data`                                                                                     | array<[Components\DirectoryGroup](../../Models/Components/DirectoryGroup.md)>              | :heavy_check_mark:                                                                         | N/A                                                                                        |
| `cursor`                                                                                   | [Components\DirectoryGroupListCursor](../../Models/Components/DirectoryGroupListCursor.md) | :heavy_check_mark:                                                                         | Cursor information for pagination.                                                         |
# Organization


## Fields

| Field                                                                                                                  | Type                                                                                                                   | Required                                                                                                               | Description                                                                                                            |
| ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------- |
| `object`                                                                                                               | [\Clerk\Backend\Models\Components\OrganizationObject](../../Models/Components/OrganizationObject.md)                   | :heavy_check_mark:                                                                                                     | N/A                                                                                                                    |
| `id`                                                                                                                   | *string*                                                                                                               | :heavy_check_mark:                                                                                                     | N/A                                                                                                                    |
| `name`                                                                                                                 | *string*                                                                                                               | :heavy_check_mark:                                                                                                     | N/A                                                                                                                    |
| `slug`                                                                                                                 | *string*                                                                                                               | :heavy_check_mark:                                                                                                     | N/A                                                                                                                    |
| `membersCount`                                                                                                         | *?int*                                                                                                                 | :heavy_minus_sign:                                                                                                     | N/A                                                                                                                    |
| `maxAllowedMemberships`                                                                                                | *int*                                                                                                                  | :heavy_check_mark:                                                                                                     | N/A                                                                                                                    |
| `adminDeleteEnabled`                                                                                                   | *?bool*                                                                                                                | :heavy_minus_sign:                                                                                                     | N/A                                                                                                                    |
| `publicMetadata`                                                                                                       | [\Clerk\Backend\Models\Components\OrganizationPublicMetadata](../../Models/Components/OrganizationPublicMetadata.md)   | :heavy_check_mark:                                                                                                     | N/A                                                                                                                    |
| `privateMetadata`                                                                                                      | [\Clerk\Backend\Models\Components\OrganizationPrivateMetadata](../../Models/Components/OrganizationPrivateMetadata.md) | :heavy_check_mark:                                                                                                     | N/A                                                                                                                    |
| `createdBy`                                                                                                            | *?string*                                                                                                              | :heavy_minus_sign:                                                                                                     | N/A                                                                                                                    |
| `createdAt`                                                                                                            | *int*                                                                                                                  | :heavy_check_mark:                                                                                                     | Unix timestamp of creation.<br/>                                                                                       |
| `updatedAt`                                                                                                            | *int*                                                                                                                  | :heavy_check_mark:                                                                                                     | Unix timestamp of last update.<br/>                                                                                    |
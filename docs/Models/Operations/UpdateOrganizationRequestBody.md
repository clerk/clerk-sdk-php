# UpdateOrganizationRequestBody


## Fields

| Field                                                                                                                               | Type                                                                                                                                | Required                                                                                                                            | Description                                                                                                                         |
| ----------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------------------------------------------------------- |
| `publicMetadata`                                                                                                                    | [?\Clerk\Backend\Models\Operations\UpdateOrganizationPublicMetadata](../../Models/Operations/UpdateOrganizationPublicMetadata.md)   | :heavy_minus_sign:                                                                                                                  | Metadata saved on the organization, that is visible to both your frontend and backend.                                              |
| `privateMetadata`                                                                                                                   | [?\Clerk\Backend\Models\Operations\UpdateOrganizationPrivateMetadata](../../Models/Operations/UpdateOrganizationPrivateMetadata.md) | :heavy_minus_sign:                                                                                                                  | Metadata saved on the organization that is only visible to your backend.                                                            |
| `name`                                                                                                                              | *?string*                                                                                                                           | :heavy_minus_sign:                                                                                                                  | The new name of the organization                                                                                                    |
| `slug`                                                                                                                              | *?string*                                                                                                                           | :heavy_minus_sign:                                                                                                                  | The new slug of the organization, which needs to be unique in the instance                                                          |
| `maxAllowedMemberships`                                                                                                             | *?int*                                                                                                                              | :heavy_minus_sign:                                                                                                                  | The maximum number of memberships allowed for this organization                                                                     |
| `adminDeleteEnabled`                                                                                                                | *?bool*                                                                                                                             | :heavy_minus_sign:                                                                                                                  | If true, an admin can delete this organization with the Frontend API.                                                               |
# OrganizationSettings


## Fields

| Field                                                                                                                | Type                                                                                                                 | Required                                                                                                             | Description                                                                                                          |
| -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `object`                                                                                                             | [\Clerk\Backend\Models\Components\OrganizationSettingsObject](../../Models/Components/OrganizationSettingsObject.md) | :heavy_check_mark:                                                                                                   | String representing the object's type. Objects of the same type share the same value.                                |
| `enabled`                                                                                                            | *bool*                                                                                                               | :heavy_check_mark:                                                                                                   | N/A                                                                                                                  |
| `maxAllowedMemberships`                                                                                              | *int*                                                                                                                | :heavy_check_mark:                                                                                                   | N/A                                                                                                                  |
| `maxAllowedRoles`                                                                                                    | *?int*                                                                                                               | :heavy_minus_sign:                                                                                                   | N/A                                                                                                                  |
| `maxAllowedPermissions`                                                                                              | *?int*                                                                                                               | :heavy_minus_sign:                                                                                                   | N/A                                                                                                                  |
| `creatorRole`                                                                                                        | *string*                                                                                                             | :heavy_check_mark:                                                                                                   | The role key that a user will be assigned after creating an organization.                                            |
| `adminDeleteEnabled`                                                                                                 | *bool*                                                                                                               | :heavy_check_mark:                                                                                                   | The default for whether an admin can delete an organization with the Frontend API.                                   |
| `domainsEnabled`                                                                                                     | *bool*                                                                                                               | :heavy_check_mark:                                                                                                   | N/A                                                                                                                  |
| `domainsEnrollmentModes`                                                                                             | array<[\Clerk\Backend\Models\Components\DomainsEnrollmentModes](../../Models/Components/DomainsEnrollmentModes.md)>  | :heavy_check_mark:                                                                                                   | N/A                                                                                                                  |
| `domainsDefaultRole`                                                                                                 | *string*                                                                                                             | :heavy_check_mark:                                                                                                   | The role key that it will be used in order to create an organization invitation or suggestion.                       |
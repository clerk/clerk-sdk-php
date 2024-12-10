# OrganizationDomain

An organization domain


## Fields

| Field                                                                                                               | Type                                                                                                                | Required                                                                                                            | Description                                                                                                         |
| ------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------- |
| `id`                                                                                                                | *?string*                                                                                                           | :heavy_minus_sign:                                                                                                  | Unique identifier for the organization domain                                                                       |
| `object`                                                                                                            | [?Components\OrganizationDomainObject](../../Models/Components/OrganizationDomainObject.md)                         | :heavy_minus_sign:                                                                                                  | String representing the object's type. Objects of the same type share the same value. Always `organization_domain`<br/> |
| `organizationId`                                                                                                    | *?string*                                                                                                           | :heavy_minus_sign:                                                                                                  | Unique identifier for the organization                                                                              |
| `name`                                                                                                              | *?string*                                                                                                           | :heavy_minus_sign:                                                                                                  | Name of the organization domain                                                                                     |
| `enrollmentMode`                                                                                                    | [?Components\EnrollmentMode](../../Models/Components/EnrollmentMode.md)                                             | :heavy_minus_sign:                                                                                                  | Mode of enrollment for the domain                                                                                   |
| `totalPendingInvitations`                                                                                           | *?int*                                                                                                              | :heavy_minus_sign:                                                                                                  | Total number of pending invitations associated with this domain                                                     |
| `totalPendingSuggestions`                                                                                           | *?int*                                                                                                              | :heavy_minus_sign:                                                                                                  | Total number of pending suggestions associated with this domain                                                     |
| `createdAt`                                                                                                         | *?int*                                                                                                              | :heavy_minus_sign:                                                                                                  | Unix timestamp when the domain was created                                                                          |
| `updatedAt`                                                                                                         | *?int*                                                                                                              | :heavy_minus_sign:                                                                                                  | Unix timestamp of the last update to the domain                                                                     |
| `affiliationEmailAddress`                                                                                           | *?string*                                                                                                           | :heavy_minus_sign:                                                                                                  | Affiliation email address for the domain, if available.                                                             |
| `verification`                                                                                                      | [?Components\OrganizationDomainVerification](../../Models/Components/OrganizationDomainVerification.md)             | :heavy_minus_sign:                                                                                                  | Verification details for the domain                                                                                 |
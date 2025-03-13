# OrganizationDomainVerification

Verification details for the domain


## Fields

| Field                                                                                      | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `status`                                                                                   | [Components\OrganizationDomainStatus](../../Models/Components/OrganizationDomainStatus.md) | :heavy_check_mark:                                                                         | Status of the verification. It can be `unverified` or `verified`                           |
| `strategy`                                                                                 | *string*                                                                                   | :heavy_check_mark:                                                                         | Name of the strategy used to verify the domain                                             |
| `attempts`                                                                                 | *int*                                                                                      | :heavy_check_mark:                                                                         | How many attempts have been made to verify the domain                                      |
| `expireAt`                                                                                 | *int*                                                                                      | :heavy_check_mark:                                                                         | Unix timestamp of when the verification will expire                                        |
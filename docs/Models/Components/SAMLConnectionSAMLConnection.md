# SAMLConnectionSAMLConnection


## Fields

| Field                              | Type                               | Required                           | Description                        |
| ---------------------------------- | ---------------------------------- | ---------------------------------- | ---------------------------------- |
| `id`                               | *string*                           | :heavy_check_mark:                 | N/A                                |
| `name`                             | *string*                           | :heavy_check_mark:                 | N/A                                |
| `domain`                           | *string*                           | :heavy_check_mark:                 | N/A                                |
| `active`                           | *bool*                             | :heavy_check_mark:                 | N/A                                |
| `provider`                         | *string*                           | :heavy_check_mark:                 | N/A                                |
| `syncUserAttributes`               | *bool*                             | :heavy_check_mark:                 | N/A                                |
| `createdAt`                        | *int*                              | :heavy_check_mark:                 | Unix timestamp of creation.<br/>   |
| `updatedAt`                        | *int*                              | :heavy_check_mark:                 | Unix timestamp of last update.<br/> |
| `allowSubdomains`                  | *?bool*                            | :heavy_minus_sign:                 | N/A                                |
| `allowIdpInitiated`                | *?bool*                            | :heavy_minus_sign:                 | N/A                                |
| `disableAdditionalIdentifications` | *?bool*                            | :heavy_minus_sign:                 | N/A                                |
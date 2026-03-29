# UpdateEnterpriseConnectionCustomAttributes


## Fields

| Field                                                              | Type                                                               | Required                                                           | Description                                                        |
| ------------------------------------------------------------------ | ------------------------------------------------------------------ | ------------------------------------------------------------------ | ------------------------------------------------------------------ |
| `name`                                                             | *string*                                                           | :heavy_check_mark:                                                 | Display name for the custom attribute                              |
| `key`                                                              | *string*                                                           | :heavy_check_mark:                                                 | Key used to store the attribute in the user's metadata             |
| `ssoPath`                                                          | *?string*                                                          | :heavy_minus_sign:                                                 | Path to extract the attribute value from SSO claims                |
| `scimPath`                                                         | *?string*                                                          | :heavy_minus_sign:                                                 | GJSON path to extract the attribute value from SCIM user resources |
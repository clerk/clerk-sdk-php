# OauthConfig

Present when the enterprise connection uses OIDC


## Fields

| Field                                                                | Type                                                                 | Required                                                             | Description                                                          |
| -------------------------------------------------------------------- | -------------------------------------------------------------------- | -------------------------------------------------------------------- | -------------------------------------------------------------------- |
| `id`                                                                 | *?string*                                                            | :heavy_minus_sign:                                                   | OAuth config ID                                                      |
| `name`                                                               | *?string*                                                            | :heavy_minus_sign:                                                   | Custom OIDC provider display name                                    |
| `providerKey`                                                        | *?string*                                                            | :heavy_minus_sign:                                                   | OAuth provider key (e.g. oidc_custom, oidc_ghe_*, oidc_gitlab_ent_*) |
| `clientId`                                                           | *?string*                                                            | :heavy_minus_sign:                                                   | OAuth client ID                                                      |
| `discoveryUrl`                                                       | *?string*                                                            | :heavy_minus_sign:                                                   | OIDC discovery URL                                                   |
| `logoPublicUrl`                                                      | *?string*                                                            | :heavy_minus_sign:                                                   | Logo URL for the provider                                            |
| `createdAt`                                                          | *?int*                                                               | :heavy_minus_sign:                                                   | Unix timestamp in milliseconds when the config was created           |
| `updatedAt`                                                          | *?int*                                                               | :heavy_minus_sign:                                                   | Unix timestamp in milliseconds when the config was last updated      |
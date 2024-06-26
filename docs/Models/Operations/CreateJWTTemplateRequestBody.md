# CreateJWTTemplateRequestBody


## Fields

| Field                                                                         | Type                                                                          | Required                                                                      | Description                                                                   |
| ----------------------------------------------------------------------------- | ----------------------------------------------------------------------------- | ----------------------------------------------------------------------------- | ----------------------------------------------------------------------------- |
| `name`                                                                        | *?string*                                                                     | :heavy_minus_sign:                                                            | JWT template name                                                             |
| `claims`                                                                      | [?\Clerk\Backend\Models\Operations\Claims](../../Models/Operations/Claims.md) | :heavy_minus_sign:                                                            | JWT template claims in JSON format                                            |
| `lifetime`                                                                    | *?float*                                                                      | :heavy_minus_sign:                                                            | JWT token lifetime                                                            |
| `allowedClockSkew`                                                            | *?float*                                                                      | :heavy_minus_sign:                                                            | JWT token allowed clock skew                                                  |
| `customSigningKey`                                                            | *?bool*                                                                       | :heavy_minus_sign:                                                            | Whether a custom signing key/algorithm is also provided for this template     |
| `signingAlgorithm`                                                            | *?string*                                                                     | :heavy_minus_sign:                                                            | The custom signing algorithm to use when minting JWTs                         |
| `signingKey`                                                                  | *?string*                                                                     | :heavy_minus_sign:                                                            | The custom signing private key to use when minting JWTs                       |
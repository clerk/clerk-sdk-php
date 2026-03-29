# SchemasEnterpriseConnectionSamlConnection

Present when the enterprise connection uses SAML


## Fields

| Field                                                           | Type                                                            | Required                                                        | Description                                                     |
| --------------------------------------------------------------- | --------------------------------------------------------------- | --------------------------------------------------------------- | --------------------------------------------------------------- |
| `id`                                                            | *?string*                                                       | :heavy_minus_sign:                                              | SAML connection ID                                              |
| `name`                                                          | *?string*                                                       | :heavy_minus_sign:                                              | SAML connection display name                                    |
| `idpEntityId`                                                   | *?string*                                                       | :heavy_minus_sign:                                              | IdP entity ID (optional, when connection details are loaded)    |
| `idpSsoUrl`                                                     | *?string*                                                       | :heavy_minus_sign:                                              | IdP SSO URL (optional, when connection details are loaded)      |
| `idpMetadataUrl`                                                | *?string*                                                       | :heavy_minus_sign:                                              | IdP metadata URL (optional, when connection details are loaded) |
| `acsUrl`                                                        | *?string*                                                       | :heavy_minus_sign:                                              | Assertion Consumer Service URL                                  |
| `spEntityId`                                                    | *?string*                                                       | :heavy_minus_sign:                                              | Service Provider entity ID                                      |
| `spMetadataUrl`                                                 | *?string*                                                       | :heavy_minus_sign:                                              | Service Provider metadata URL                                   |
| `active`                                                        | *?bool*                                                         | :heavy_minus_sign:                                              | Whether the SAML connection is active                           |
| `allowIdpInitiated`                                             | *?bool*                                                         | :heavy_minus_sign:                                              | Whether IdP-initiated SSO is allowed                            |
| `allowSubdomains`                                               | *?bool*                                                         | :heavy_minus_sign:                                              | Whether subdomains are allowed for domain matching              |
| `forceAuthn`                                                    | *?bool*                                                         | :heavy_minus_sign:                                              | Whether to force re-authentication                              |
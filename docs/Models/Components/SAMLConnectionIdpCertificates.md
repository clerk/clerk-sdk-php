# SAMLConnectionIdpCertificates


## Fields

| Field                                                | Type                                                 | Required                                             | Description                                          |
| ---------------------------------------------------- | ---------------------------------------------------- | ---------------------------------------------------- | ---------------------------------------------------- |
| `certificate`                                        | *string*                                             | :heavy_check_mark:                                   | The X.509 certificate, base64 DER without PEM armor  |
| `issuedAt`                                           | *int*                                                | :heavy_check_mark:                                   | Unix timestamp (milliseconds) of the X.509 NotBefore |
| `expiresAt`                                          | *int*                                                | :heavy_check_mark:                                   | Unix timestamp (milliseconds) of the X.509 NotAfter  |
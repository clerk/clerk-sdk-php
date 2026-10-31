# Act

The actor chain of an access token issued by an OAuth 2.0 Token Exchange (RFC 8693 section 4.1). Omitted for other access tokens.


## Fields

| Field                                                                     | Type                                                                      | Required                                                                  | Description                                                               |
| ------------------------------------------------------------------------- | ------------------------------------------------------------------------- | ------------------------------------------------------------------------- | ------------------------------------------------------------------------- |
| `iss`                                                                     | *?string*                                                                 | :heavy_minus_sign:                                                        | N/A                                                                       |
| `sub`                                                                     | *string*                                                                  | :heavy_check_mark:                                                        | N/A                                                                       |
| `act`                                                                     | [?Operations\ResponseBodyAct](../../Models/Operations/ResponseBodyAct.md) | :heavy_minus_sign:                                                        | N/A                                                                       |
# OAuthApplicationSettings

Success


## Fields

| Field                                                                                                   | Type                                                                                                    | Required                                                                                                | Description                                                                                             |
| ------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------- |
| `object`                                                                                                | [Components\OAuthApplicationSettingsObject](../../Models/Components/OAuthApplicationSettingsObject.md)  | :heavy_check_mark:                                                                                      | String representing the object's type. Objects of the same type share the same value.                   |
| `dynamicOauthClientRegistration`                                                                        | *bool*                                                                                                  | :heavy_check_mark:                                                                                      | Whether dynamic OAuth client registration is enabled for the instance (RFC 7591).                       |
| `oauthJwtAccessTokens`                                                                                  | *bool*                                                                                                  | :heavy_check_mark:                                                                                      | Whether OAuth JWT access tokens are enabled for the instance (disabled indicates opaque access tokens). |
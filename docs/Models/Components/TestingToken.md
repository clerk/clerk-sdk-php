# TestingToken


## Fields

| Field                                                                                                                                | Type                                                                                                                                 | Required                                                                                                                             | Description                                                                                                                          | Example                                                                                                                              |
| ------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------ |
| `object`                                                                                                                             | [\Clerk\Backend\Models\Components\TestingTokenObject](../../Models/Components/TestingTokenObject.md)                                 | :heavy_check_mark:                                                                                                                   | N/A                                                                                                                                  |                                                                                                                                      |
| `token`                                                                                                                              | *string*                                                                                                                             | :heavy_check_mark:                                                                                                                   | The actual token. This value is meant to be passed in the `__clerk_testing_token` query parameter with requests to the Frontend API. | 1713877200-c_2J2MvPu9PnXcuhbPZNao0LOXqK9A7YrnBn0HmIWxy                                                                               |
| `expiresAt`                                                                                                                          | *int*                                                                                                                                | :heavy_check_mark:                                                                                                                   | Unix timestamp of the token's expiration time.<br/>                                                                                  | 1713880800                                                                                                                           |
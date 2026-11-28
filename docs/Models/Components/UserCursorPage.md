# UserCursorPage

A page of users from `GET /v1/users` with `pagination=cursor`.


## Fields

| Field                                                     | Type                                                      | Required                                                  | Description                                               |
| --------------------------------------------------------- | --------------------------------------------------------- | --------------------------------------------------------- | --------------------------------------------------------- |
| `data`                                                    | array<[Components\User](../../Models/Components/User.md)> | :heavy_check_mark:                                        | N/A                                                       |
| `cursor`                                                  | [Components\Cursor](../../Models/Components/Cursor.md)    | :heavy_check_mark:                                        | Cursor information for pagination.                        |
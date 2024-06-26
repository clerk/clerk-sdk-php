# Domain


## Fields

| Field                                                                                         | Type                                                                                          | Required                                                                                      | Description                                                                                   |
| --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- |
| `object`                                                                                      | [\Clerk\Backend\Models\Components\DomainObject](../../Models/Components/DomainObject.md)      | :heavy_check_mark:                                                                            | N/A                                                                                           |
| `id`                                                                                          | *string*                                                                                      | :heavy_check_mark:                                                                            | N/A                                                                                           |
| `name`                                                                                        | *string*                                                                                      | :heavy_check_mark:                                                                            | N/A                                                                                           |
| `isSatellite`                                                                                 | *bool*                                                                                        | :heavy_check_mark:                                                                            | N/A                                                                                           |
| `frontendApiUrl`                                                                              | *string*                                                                                      | :heavy_check_mark:                                                                            | N/A                                                                                           |
| `accountsPortalUrl`                                                                           | *?string*                                                                                     | :heavy_minus_sign:                                                                            | Null for satellite domains.<br/>                                                              |
| `proxyUrl`                                                                                    | *?string*                                                                                     | :heavy_minus_sign:                                                                            | N/A                                                                                           |
| `developmentOrigin`                                                                           | *string*                                                                                      | :heavy_check_mark:                                                                            | N/A                                                                                           |
| `cnameTargets`                                                                                | array<[\Clerk\Backend\Models\Components\CNameTarget](../../Models/Components/CNameTarget.md)> | :heavy_minus_sign:                                                                            | N/A                                                                                           |
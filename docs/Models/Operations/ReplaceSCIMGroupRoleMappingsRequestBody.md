# ReplaceSCIMGroupRoleMappingsRequestBody


## Fields

| Field                                                                                                     | Type                                                                                                      | Required                                                                                                  | Description                                                                                               |
| --------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------- |
| `mappings`                                                                                                | array<[Operations\Mappings](../../Models/Operations/Mappings.md)>                                         | :heavy_check_mark:                                                                                        | The desired set of mappings. Array order sets precedence (1-indexed). An empty array clears all mappings. |
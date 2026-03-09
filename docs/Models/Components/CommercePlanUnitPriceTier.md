# CommercePlanUnitPriceTier


## Fields

| Field                                                                                | Type                                                                                 | Required                                                                             | Description                                                                          |
| ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ |
| `startsAtBlock`                                                                      | *int*                                                                                | :heavy_check_mark:                                                                   | Start block (inclusive) for this tier                                                |
| `endsAfterBlock`                                                                     | *?int*                                                                               | :heavy_minus_sign:                                                                   | End block (inclusive) for this tier; null means unlimited                            |
| `feePerBlock`                                                                        | [Components\CommerceMoneyResponse](../../Models/Components/CommerceMoneyResponse.md) | :heavy_check_mark:                                                                   | N/A                                                                                  |
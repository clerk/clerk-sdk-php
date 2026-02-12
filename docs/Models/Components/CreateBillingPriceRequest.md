# CreateBillingPriceRequest


## Fields

| Field                                                               | Type                                                                | Required                                                            | Description                                                         |
| ------------------------------------------------------------------- | ------------------------------------------------------------------- | ------------------------------------------------------------------- | ------------------------------------------------------------------- |
| `planId`                                                            | *string*                                                            | :heavy_check_mark:                                                  | The ID of the plan this price belongs to.                           |
| `currency`                                                          | *?string*                                                           | :heavy_minus_sign:                                                  | The currency code (e.g., "USD"). Defaults to USD.                   |
| `amount`                                                            | *int*                                                               | :heavy_check_mark:                                                  | The amount in cents for the price. Must be at least $1 (100 cents). |
| `annualMonthlyAmount`                                               | *?int*                                                              | :heavy_minus_sign:                                                  | The monthly amount in cents when billed annually. Optional.         |
| `description`                                                       | *?string*                                                           | :heavy_minus_sign:                                                  | An optional description for this custom price.                      |
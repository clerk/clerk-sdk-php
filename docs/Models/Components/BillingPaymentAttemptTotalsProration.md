# BillingPaymentAttemptTotalsProration

Proration details from passed subscription time


## Fields

| Field                                                                                | Type                                                                                 | Required                                                                             | Description                                                                          |
| ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ |
| `amount`                                                                             | [Components\CommerceMoneyResponse](../../Models/Components/CommerceMoneyResponse.md) | :heavy_check_mark:                                                                   | N/A                                                                                  |
| `cycleDaysPassed`                                                                    | *int*                                                                                | :heavy_check_mark:                                                                   | Number of days that have passed in the billing cycle                                 |
| `cycleDaysTotal`                                                                     | *int*                                                                                | :heavy_check_mark:                                                                   | Total number of days in the billing cycle                                            |
| `cyclePassedPercent`                                                                 | *float*                                                                              | :heavy_check_mark:                                                                   | Percentage of the billing cycle that has passed                                      |
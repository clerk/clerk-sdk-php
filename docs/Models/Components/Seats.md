# Seats

Seat quantity for seat-based billing.


## Fields

| Field                                                                                                           | Type                                                                                                            | Required                                                                                                        | Description                                                                                                     |
| --------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------- |
| `quantity`                                                                                                      | *int*                                                                                                           | :heavy_check_mark:                                                                                              | Seat quantity being billed; null means unlimited                                                                |
| `tiers`                                                                                                         | array<[Components\SchemasCommercePerUnitTotalTier](../../Models/Components/SchemasCommercePerUnitTotalTier.md)> | :heavy_minus_sign:                                                                                              | Per-unit cost breakdown by pricing tier                                                                         |
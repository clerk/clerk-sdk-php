# LogEnvironmentContext

Environment context for the log event.


## Fields

| Field                                                                                 | Type                                                                                  | Required                                                                              | Description                                                                           |
| ------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------- |
| `type`                                                                                | *?string*                                                                             | :heavy_minus_sign:                                                                    | The environment type (e.g., "development", "production").                             |
| `application`                                                                         | [?Components\LogApplicationContext](../../Models/Components/LogApplicationContext.md) | :heavy_minus_sign:                                                                    | Application context information.                                                      |
| `domain`                                                                              | [?Components\LogDomainContext](../../Models/Components/LogDomainContext.md)           | :heavy_minus_sign:                                                                    | Domain context information.                                                           |
| `primaryDomain`                                                                       | [?Components\LogDomainContext](../../Models/Components/LogDomainContext.md)           | :heavy_minus_sign:                                                                    | Domain context information.                                                           |
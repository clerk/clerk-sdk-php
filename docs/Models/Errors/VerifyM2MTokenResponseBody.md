# VerifyM2MTokenResponseBody

400 Bad Request


## Fields

| Field                                                                                                        | Type                                                                                                         | Required                                                                                                     | Description                                                                                                  |
| ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ |
| `errors`                                                                                                     | array<[Errors\VerifyM2MTokenErrors](../../Models/Errors/VerifyM2MTokenErrors.md)>                            | :heavy_check_mark:                                                                                           | N/A                                                                                                          |
| `rawResponse`                                                                                                | [\Psr\Http\Message\ResponseInterface](https://www.php-fig.org/psr/psr-7/#33-psrhttpmessageresponseinterface) | :heavy_minus_sign:                                                                                           | Raw HTTP response; suitable for custom response parsing                                                      |
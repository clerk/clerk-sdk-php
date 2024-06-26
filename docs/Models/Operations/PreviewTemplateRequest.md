# PreviewTemplateRequest


## Fields

| Field                                                                                                                 | Type                                                                                                                  | Required                                                                                                              | Description                                                                                                           |
| --------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------- |
| `templateType`                                                                                                        | *string*                                                                                                              | :heavy_check_mark:                                                                                                    | The type of template to preview                                                                                       |
| `slug`                                                                                                                | *string*                                                                                                              | :heavy_check_mark:                                                                                                    | The slug of the template to preview                                                                                   |
| `requestBody`                                                                                                         | [?\Clerk\Backend\Models\Operations\PreviewTemplateRequestBody](../../Models/Operations/PreviewTemplateRequestBody.md) | :heavy_minus_sign:                                                                                                    | Required parameters                                                                                                   |
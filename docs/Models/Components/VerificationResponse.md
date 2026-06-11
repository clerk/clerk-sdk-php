# VerificationResponse

The verification. After prepare_verification it is pending (unverified);
after attempt_verification its status reflects the attempt outcome.


## Fields

| Field                                                                      | Type                                                                       | Required                                                                   | Description                                                                |
| -------------------------------------------------------------------------- | -------------------------------------------------------------------------- | -------------------------------------------------------------------------- | -------------------------------------------------------------------------- |
| `object`                                                                   | *?string*                                                                  | :heavy_minus_sign:                                                         | The type of the verification object.                                       |
| `id`                                                                       | *?string*                                                                  | :heavy_minus_sign:                                                         | The ID of the verification. Pass this to attempt_verification.             |
| `status`                                                                   | *?string*                                                                  | :heavy_minus_sign:                                                         | The status of the verification (unverified, verified, expired, or failed). |
| `strategy`                                                                 | *?string*                                                                  | :heavy_minus_sign:                                                         | The verification strategy (email_code or phone_code).                      |
| `attempts`                                                                 | *?int*                                                                     | :heavy_minus_sign:                                                         | The number of attempts made against this verification.                     |
| `expireAt`                                                                 | *?int*                                                                     | :heavy_minus_sign:                                                         | Unix timestamp (milliseconds) at which the code expires.                   |
| `channel`                                                                  | *?string*                                                                  | :heavy_minus_sign:                                                         | The channel the code was sent over (phone numbers only).                   |
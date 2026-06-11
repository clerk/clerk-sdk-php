# PreferredSignInStrategyWhenPasswordRequired

When password is required at the instance level, sets the preferred sign-in strategy surfaced to Clerk components. Has no effect when password is not required. Defaults to `password`. Set to an empty string to clear the override.


## Values

| Name       | Value      |
| ---------- | ---------- |
| `Password` | password   |
| `Otp`      | otp        |
| `Unknown`  |            |
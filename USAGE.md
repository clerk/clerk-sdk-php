<!-- Start SDK Example Usage [usage] -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();



$response = $sdk->emailAddresses->get(
    emailAddressId: '<id>'
);

if ($response->emailAddress !== null) {
    // handle response
}
```
<!-- End SDK Example Usage [usage] -->
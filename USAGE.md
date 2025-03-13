<!-- Start SDK Example Usage [usage] -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()->build();

$request = new Operations\GetPublicInterstitialRequest();

$response = $sdk->miscellaneous->getPublicInterstitial(
    request: $request
);

if ($response->statusCode === 200) {
    // handle response
}
```
<!-- End SDK Example Usage [usage] -->
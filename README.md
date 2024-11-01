<p align="center">
  <a href="https://clerk.com?utm_source=github&utm_medium=clerk-backend-php" target="_blank" rel="noopener noreferrer">
    <picture>
      <source media="(prefers-color-scheme: dark)" srcset="https://images.clerk.com/static/logo-dark-mode-400x400.png">
      <img src="https://images.clerk.com/static/logo-light-mode-400x400.png" height="64">
    </picture>
  </a>
  <br />
</p>

# clerk/backend-php

<div align="center">

[![Chat on Discord](https://img.shields.io/discord/856971667393609759.svg?logo=discord)](https://clerk.com/discord)
[![Clerk documentation](https://img.shields.io/badge/documentation-clerk-green.svg)](https://clerk.com/docs?utm_source=github&utm_medium=koa)
[![Follow on Twitter](https://img.shields.io/twitter/follow/ClerkDev?style=social)](https://twitter.com/intent/follow?screen_name=ClerkDev)

[Changelog](https://github.com/clerk/backend-php/blob/main/CHANGELOG.md)
·
[Ask a Question](https://github.com/clerk/backend-php/discussions)

</div>

---

## Overview

[Clerk](https://clerk.com?utm_source=github&utm_medium=clerk-backend-php) is the easiest way to add authentication and user management to your application. To gain a better understanding of the Clerk Backend API, refer to the <a href="https://clerk.com/docs/reference/backend-api" target="_blank">Backend API</a> documentation.

## Getting started

### Prerequisites

## Installation

```sh
composer require clerk/backend-php
```

## Usage

Retrieve your Backend API key from the [API Keys](https://dashboard.clerk.com/last-active?path=api-keys) screen in your Clerk dashboard and set it as an environment variable in a `.env` file:

```sh
CLERK_PUBLISHABLE_KEY=pk_*******
CLERK_SECRET_KEY=sk_******
```


<!-- Start Available Resources and Operations [operations] -->
## Available Resources and Operations

<details open>
<summary>Available methods</summary>

### [actorTokens](docs/sdks/actortokens/README.md)

* [create](docs/sdks/actortokens/README.md#create) - Create actor token
* [revoke](docs/sdks/actortokens/README.md#revoke) - Revoke actor token

### [allowlistBlocklist](docs/sdks/allowlistblocklist/README.md)

* [listAllowlistIdentifiers](docs/sdks/allowlistblocklist/README.md#listallowlistidentifiers) - List all identifiers on the allow-list
* [createAllowlistIdentifier](docs/sdks/allowlistblocklist/README.md#createallowlistidentifier) - Add identifier to the allow-list
* [createBlocklistIdentifier](docs/sdks/allowlistblocklist/README.md#createblocklistidentifier) - Add identifier to the block-list
* [deleteBlocklistIdentifier](docs/sdks/allowlistblocklist/README.md#deleteblocklistidentifier) - Delete identifier from block-list

### [allowlistIdentifiers](docs/sdks/allowlistidentifiers/README.md)

* [delete](docs/sdks/allowlistidentifiers/README.md#delete) - Delete identifier from allow-list

### [betaFeatures](docs/sdks/betafeatures/README.md)

* [updateInstanceSettings](docs/sdks/betafeatures/README.md#updateinstancesettings) - Update instance settings
* [~~updateDomain~~](docs/sdks/betafeatures/README.md#updatedomain) - Update production instance domain :warning: **Deprecated**
* [changeProductionInstanceDomain](docs/sdks/betafeatures/README.md#changeproductioninstancedomain) - Update production instance domain

### [blocklistIdentifiers](docs/sdks/blocklistidentifiers/README.md)

* [list](docs/sdks/blocklistidentifiers/README.md#list) - List all identifiers on the block-list


### [clients](docs/sdks/clients/README.md)

* [~~list~~](docs/sdks/clients/README.md#list) - List all clients :warning: **Deprecated**
* [verify](docs/sdks/clients/README.md#verify) - Verify a client
* [get](docs/sdks/clients/README.md#get) - Get a client

### [domains](docs/sdks/domains/README.md)

* [list](docs/sdks/domains/README.md#list) - List all instance domains
* [add](docs/sdks/domains/README.md#add) - Add a domain
* [delete](docs/sdks/domains/README.md#delete) - Delete a satellite domain
* [update](docs/sdks/domains/README.md#update) - Update a domain

### [emailAddresses](docs/sdks/emailaddresses/README.md)

* [create](docs/sdks/emailaddresses/README.md#create) - Create an email address
* [get](docs/sdks/emailaddresses/README.md#get) - Retrieve an email address
* [delete](docs/sdks/emailaddresses/README.md#delete) - Delete an email address
* [update](docs/sdks/emailaddresses/README.md#update) - Update an email address

### [~~emailAndSmsTemplates~~](docs/sdks/emailandsmstemplates/README.md)

* [~~upsert~~](docs/sdks/emailandsmstemplates/README.md#upsert) - Update a template for a given type and slug :warning: **Deprecated**

### [~~emailSMSTemplates~~](docs/sdks/emailsmstemplates/README.md)

* [~~list~~](docs/sdks/emailsmstemplates/README.md#list) - List all templates :warning: **Deprecated**
* [~~revert~~](docs/sdks/emailsmstemplates/README.md#revert) - Revert a template :warning: **Deprecated**
* [~~get~~](docs/sdks/emailsmstemplates/README.md#get) - Retrieve a template :warning: **Deprecated**
* [~~toggleTemplateDelivery~~](docs/sdks/emailsmstemplates/README.md#toggletemplatedelivery) - Toggle the delivery by Clerk for a template of a given type and slug :warning: **Deprecated**

### [instanceSettings](docs/sdks/instancesettings/README.md)

* [update](docs/sdks/instancesettings/README.md#update) - Update instance settings
* [updateRestrictions](docs/sdks/instancesettings/README.md#updaterestrictions) - Update instance restrictions
* [updateOrganizationSettings](docs/sdks/instancesettings/README.md#updateorganizationsettings) - Update instance organization settings

### [invitations](docs/sdks/invitations/README.md)

* [create](docs/sdks/invitations/README.md#create) - Create an invitation
* [list](docs/sdks/invitations/README.md#list) - List all invitations
* [revoke](docs/sdks/invitations/README.md#revoke) - Revokes an invitation

### [jwks](docs/sdks/jwks/README.md)

* [get](docs/sdks/jwks/README.md#get) - Retrieve the JSON Web Key Set of the instance

### [jwtTemplates](docs/sdks/jwttemplates/README.md)

* [list](docs/sdks/jwttemplates/README.md#list) - List all templates
* [create](docs/sdks/jwttemplates/README.md#create) - Create a JWT template
* [get](docs/sdks/jwttemplates/README.md#get) - Retrieve a template
* [update](docs/sdks/jwttemplates/README.md#update) - Update a JWT template
* [delete](docs/sdks/jwttemplates/README.md#delete) - Delete a Template

### [miscellaneous](docs/sdks/miscellaneous/README.md)

* [getInterstitial](docs/sdks/miscellaneous/README.md#getinterstitial) - Returns the markup for the interstitial page

### [oauthApplications](docs/sdks/oauthapplications/README.md)

* [list](docs/sdks/oauthapplications/README.md#list) - Get a list of OAuth applications for an instance
* [create](docs/sdks/oauthapplications/README.md#create) - Create an OAuth application
* [get](docs/sdks/oauthapplications/README.md#get) - Retrieve an OAuth application by ID
* [update](docs/sdks/oauthapplications/README.md#update) - Update an OAuth application
* [delete](docs/sdks/oauthapplications/README.md#delete) - Delete an OAuth application
* [rotateSecret](docs/sdks/oauthapplications/README.md#rotatesecret) - Rotate the client secret of the given OAuth application

### [organizationDomain](docs/sdks/organizationdomain/README.md)

* [update](docs/sdks/organizationdomain/README.md#update) - Update an organization domain.

### [organizationDomains](docs/sdks/organizationdomains/README.md)

* [create](docs/sdks/organizationdomains/README.md#create) - Create a new organization domain.
* [list](docs/sdks/organizationdomains/README.md#list) - Get a list of all domains of an organization.
* [delete](docs/sdks/organizationdomains/README.md#delete) - Remove a domain from an organization.

### [organizationInvitations](docs/sdks/organizationinvitations/README.md)

* [getAll](docs/sdks/organizationinvitations/README.md#getall) - Get a list of organization invitations for the current instance
* [create](docs/sdks/organizationinvitations/README.md#create) - Create and send an organization invitation
* [list](docs/sdks/organizationinvitations/README.md#list) - Get a list of organization invitations
* [bulkCreate](docs/sdks/organizationinvitations/README.md#bulkcreate) - Bulk create and send organization invitations
* [~~listPending~~](docs/sdks/organizationinvitations/README.md#listpending) - Get a list of pending organization invitations :warning: **Deprecated**
* [get](docs/sdks/organizationinvitations/README.md#get) - Retrieve an organization invitation by ID
* [revoke](docs/sdks/organizationinvitations/README.md#revoke) - Revoke a pending organization invitation

### [organizationMemberships](docs/sdks/organizationmemberships/README.md)

* [create](docs/sdks/organizationmemberships/README.md#create) - Create a new organization membership
* [list](docs/sdks/organizationmemberships/README.md#list) - Get a list of all members of an organization
* [update](docs/sdks/organizationmemberships/README.md#update) - Update an organization membership
* [delete](docs/sdks/organizationmemberships/README.md#delete) - Remove a member from an organization
* [updateMetadata](docs/sdks/organizationmemberships/README.md#updatemetadata) - Merge and update organization membership metadata
* [getAll](docs/sdks/organizationmemberships/README.md#getall) - Get a list of all organization memberships within an instance.

### [organizations](docs/sdks/organizations/README.md)

* [list](docs/sdks/organizations/README.md#list) - Get a list of organizations for an instance
* [create](docs/sdks/organizations/README.md#create) - Create an organization
* [get](docs/sdks/organizations/README.md#get) - Retrieve an organization by ID or slug
* [update](docs/sdks/organizations/README.md#update) - Update an organization
* [delete](docs/sdks/organizations/README.md#delete) - Delete an organization
* [mergeMetadata](docs/sdks/organizations/README.md#mergemetadata) - Merge and update metadata for an organization
* [uploadLogo](docs/sdks/organizations/README.md#uploadlogo) - Upload a logo for the organization
* [deleteLogo](docs/sdks/organizations/README.md#deletelogo) - Delete the organization's logo.

### [phoneNumbers](docs/sdks/phonenumbers/README.md)

* [create](docs/sdks/phonenumbers/README.md#create) - Create a phone number
* [get](docs/sdks/phonenumbers/README.md#get) - Retrieve a phone number
* [delete](docs/sdks/phonenumbers/README.md#delete) - Delete a phone number
* [update](docs/sdks/phonenumbers/README.md#update) - Update a phone number

### [proxyChecks](docs/sdks/proxychecks/README.md)

* [verify](docs/sdks/proxychecks/README.md#verify) - Verify the proxy configuration for your domain

### [redirectUrls](docs/sdks/clerkbackendredirecturls/README.md)

* [create](docs/sdks/clerkbackendredirecturls/README.md#create) - Create a redirect URL
* [get](docs/sdks/clerkbackendredirecturls/README.md#get) - Retrieve a redirect URL
* [delete](docs/sdks/clerkbackendredirecturls/README.md#delete) - Delete a redirect URL

### [redirectURLs](docs/sdks/redirecturls/README.md)

* [list](docs/sdks/redirecturls/README.md#list) - List all redirect URLs

### [samlConnections](docs/sdks/samlconnections/README.md)

* [list](docs/sdks/samlconnections/README.md#list) - Get a list of SAML Connections for an instance
* [create](docs/sdks/samlconnections/README.md#create) - Create a SAML Connection
* [get](docs/sdks/samlconnections/README.md#get) - Retrieve a SAML Connection by ID
* [update](docs/sdks/samlconnections/README.md#update) - Update a SAML Connection
* [delete](docs/sdks/samlconnections/README.md#delete) - Delete a SAML Connection

### [sessions](docs/sdks/sessions/README.md)

* [list](docs/sdks/sessions/README.md#list) - List all sessions
* [get](docs/sdks/sessions/README.md#get) - Retrieve a session
* [revoke](docs/sdks/sessions/README.md#revoke) - Revoke a session
* [~~verify~~](docs/sdks/sessions/README.md#verify) - Verify a session :warning: **Deprecated**
* [createTokenFromTemplate](docs/sdks/sessions/README.md#createtokenfromtemplate) - Create a session token from a jwt template

### [signInTokens](docs/sdks/signintokens/README.md)

* [create](docs/sdks/signintokens/README.md#create) - Create sign-in token
* [revoke](docs/sdks/signintokens/README.md#revoke) - Revoke the given sign-in token

### [signUps](docs/sdks/signups/README.md)

* [update](docs/sdks/signups/README.md#update) - Update a sign-up

### [~~templates~~](docs/sdks/templates/README.md)

* [~~preview~~](docs/sdks/templates/README.md#preview) - Preview changes to a template :warning: **Deprecated**

### [testingTokens](docs/sdks/testingtokens/README.md)

* [create](docs/sdks/testingtokens/README.md#create) - Retrieve a new testing token

### [users](docs/sdks/users/README.md)

* [list](docs/sdks/users/README.md#list) - List all users
* [create](docs/sdks/users/README.md#create) - Create a new user
* [count](docs/sdks/users/README.md#count) - Count users
* [get](docs/sdks/users/README.md#get) - Retrieve a user
* [update](docs/sdks/users/README.md#update) - Update a user
* [delete](docs/sdks/users/README.md#delete) - Delete a user
* [ban](docs/sdks/users/README.md#ban) - Ban a user
* [unban](docs/sdks/users/README.md#unban) - Unban a user
* [lock](docs/sdks/users/README.md#lock) - Lock a user
* [unlock](docs/sdks/users/README.md#unlock) - Unlock a user
* [setProfileImage](docs/sdks/users/README.md#setprofileimage) - Set user profile image
* [deleteProfileImage](docs/sdks/users/README.md#deleteprofileimage) - Delete user profile image
* [updateMetadata](docs/sdks/users/README.md#updatemetadata) - Merge and update a user's metadata
* [getOAuthAccessToken](docs/sdks/users/README.md#getoauthaccesstoken) - Retrieve the OAuth access token of a user
* [getOrganizationMemberships](docs/sdks/users/README.md#getorganizationmemberships) - Retrieve all memberships for a user
* [getOrganizationInvitations](docs/sdks/users/README.md#getorganizationinvitations) - Retrieve all invitations for a user
* [verifyPassword](docs/sdks/users/README.md#verifypassword) - Verify the password of a user
* [verifyTOTP](docs/sdks/users/README.md#verifytotp) - Verify a TOTP or backup code for a user
* [disableMFA](docs/sdks/users/README.md#disablemfa) - Disable a user's MFA methods
* [deleteBackupCodes](docs/sdks/users/README.md#deletebackupcodes) - Disable all user's Backup codes
* [deletePasskey](docs/sdks/users/README.md#deletepasskey) - Delete a user passkey
* [deleteWeb3Wallet](docs/sdks/users/README.md#deleteweb3wallet) - Delete a user web3 wallet
* [createTOTP](docs/sdks/users/README.md#createtotp) - Create a TOTP for a user
* [deleteTotp](docs/sdks/users/README.md#deletetotp) - Delete all the user's TOTPs
* [deleteExternalAccount](docs/sdks/users/README.md#deleteexternalaccount) - Delete External Account

### [webhooks](docs/sdks/webhooks/README.md)

* [createSvixApp](docs/sdks/webhooks/README.md#createsvixapp) - Create a Svix app
* [deleteSvixApp](docs/sdks/webhooks/README.md#deletesvixapp) - Delete a Svix app
* [generateSvixAuthURL](docs/sdks/webhooks/README.md#generatesvixauthurl) - Create a Svix Dashboard URL

</details>
<!-- End Available Resources and Operations [operations] -->

<!-- Start Error Handling [errors] -->
## Error Handling

Handling errors in this SDK should largely match your expectations. All operations return a response object or throw an exception.

By default an API error will raise a `Errors\SDKException` exception, which has the following properties:

| Property       | Type                                    | Description           |
|----------------|-----------------------------------------|-----------------------|
| `$message`     | *string*                                | The error message     |
| `$statusCode`  | *int*                                   | The HTTP status code  |
| `$rawResponse` | *?\Psr\Http\Message\ResponseInterface*  | The raw HTTP response |
| `$body`        | *string*                                | The response content  |

When custom error responses are specified for an operation, the SDK may also throw their associated exception. You can refer to respective *Errors* tables in SDK docs for more details on possible exception types for each operation. For example, the `verify` method throws the following exceptions:

| Error Type          | Status Code         | Content Type        |
| ------------------- | ------------------- | ------------------- |
| Errors\ClerkErrors1 | 400, 401, 404       | application/json    |
| Errors\SDKException | 4XX, 5XX            | \*/\*               |

### Example

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Operations;

$security = '<YOUR_BEARER_TOKEN_HERE>';

$sdk = Backend\ClerkBackend::builder()->setSecurity($security)->build();

try {
    $request = new Operations\VerifyClientRequestBody();

    $response = $sdk->clients->verify(
        request: $request
    );

    if ($response->client !== null) {
        // handle response
    }
} catch (Errors\ClerkErrors1Throwable $e) {
    // handle $e->$container data
    throw $e;
} catch (Errors\SDKException $e) {
    // handle default exception
    throw $e;
}
```
<!-- End Error Handling [errors] -->

<!-- Start Server Selection [server] -->
## Server Selection

## Server Selection

### Select Server by Index

You can override the default server globally by passing a server index to the `server_idx: int` optional parameter when initializing the SDK client instance. The selected server will then be used as the default on the operations that use it. This table lists the indexes associated with the available servers:

| # | Server | Variables |
| - | ------ | --------- |
| 0 | `https://api.clerk.com/v1` | None |




### Override Server URL Per-Client

The default server can also be overridden globally by passing a URL to the `server_url: str` optional parameter when initializing the SDK client instance. For example:
<!-- End Server Selection [server] -->

<!-- Start Summary [summary] -->
## Summary

Clerk Backend API: The Clerk REST Backend API, meant to be accessed by backend
servers.

### Versions

When the API changes in a way that isn't compatible with older versions, a new version is released.
Each version is identified by its release date, e.g. `2021-02-05`. For more information, please see [Clerk API Versions](https://clerk.com/docs/backend-requests/versioning/overview).


Please see https://clerk.com/docs for more information.

More information about the API can be found at https://clerk.com/docs
<!-- End Summary [summary] -->

<!-- Start Table of Contents [toc] -->
## Table of Contents

* [SDK Installation](#sdk-installation)
* [SDK Example Usage](#sdk-example-usage)
* [Available Resources and Operations](#available-resources-and-operations)
* [Error Handling](#error-handling)
* [Server Selection](#server-selection)
<!-- End Table of Contents [toc] -->

<!-- Start SDK Installation [installation] -->
## SDK Installation

The SDK relies on [Composer](https://getcomposer.org/) to manage its dependencies.

To install the SDK and add it as a dependency to an existing `composer.json` file:
```bash
composer require "clerk/backend-php"
```
<!-- End SDK Installation [installation] -->

<!-- Start SDK Example Usage [usage] -->
## SDK Example Usage

### Example

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

<!-- Placeholder for Future Speakeasy SDK Sections -->

# Development

## Maturity

This SDK is in beta, and there may be breaking changes between versions without a major version update. Therefore, we recommend pinning usage
to a specific package version. This way, you can install the same version each time without breaking changes unless you are intentionally
looking for the latest version.

## Support

You can get in touch with us in any of the following ways:

- Join the official community [Clerk Discord server](https://clerk.com/discord)
- Create a [GitHub Discussion](https://github.com/clerk/backend-php/discussions)
- Contact options listed on [Clerk Support page](https://clerk.com/support?utm_source=github&utm_medium=clerk-backend-php)

## Contributing

We're open to all community contributions!

## Security

`@clerk/backend-php` follows good practices of security, but 100% security cannot be assured.

`@clerk/backend-php` is provided **"as is"** without any **warranty**. Use at your own risk.

_For more information and to report security issues, please refer to the [security documentation](https://github.com/clerk/backend-php/blob/main/docs/SECURITY.md)._

## License

This project is licensed under the **MIT license**.

See [LICENSE](https://github.com/clerk/backend-php/blob/main/LICENSE) for more information.

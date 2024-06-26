# clerk/backend-php

<div align="left">
    <a href="https://speakeasyapi.dev/"><img src="https://custom-icon-badges.demolab.com/badge/-Built%20By%20Speakeasy-212015?style=for-the-badge&logoColor=FBE331&logo=speakeasy&labelColor=545454" /></a>
    <a href="https://opensource.org/licenses/MIT">
        <img src="https://img.shields.io/badge/License-MIT-blue.svg" style="width: 100px; height: 28px;" />
    </a>
</div>


## 🏗 **Welcome to your new SDK!** 🏗

It has been generated successfully based on your OpenAPI spec. However, it is not yet ready for production use. Here are some next steps:
- [ ] 🛠 Make your SDK feel handcrafted by [customizing it](https://www.speakeasyapi.dev/docs/customize-sdks)
- [ ] ♻️ Refine your SDK quickly by iterating locally with the [Speakeasy CLI](https://github.com/speakeasy-api/speakeasy)
- [ ] 🎁 Publish your SDK to package managers by [configuring automatic publishing](https://www.speakeasyapi.dev/docs/advanced-setup/publish-sdks)
- [ ] ✨ When ready to productionize, delete this section from the README

<!-- Start SDK Installation [installation] -->
## SDK Installation

### Composer

To install the SDK first add the below to your `composer.json` file:

```json
{
    "repositories": [
        {
            "type": "github",
            "url": "<UNSET>.git"
        }
    ],
    "require": {
        "clerk/backend-php": "*"
    }
}
```

Then run the following command:

```bash
composer update
```
<!-- End SDK Installation [installation] -->

<!-- Start SDK Example Usage [usage] -->
## SDK Example Usage

### Example

```php
<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Clerk\Backend;
use Clerk\Backend\Models\Components;
use Clerk\Backend\Models\Operations;

$sdk = Backend\ClerkBackend::builder()->build();

try {
    $response = $sdk->miscellaneous->getPublicInterstitial('<value>', '<value>');

    if ($response->statusCode === 200) {
        // handle response
    }
} catch (Throwable $e) {
    // handle exception
}

```
<!-- End SDK Example Usage [usage] -->

<!-- Start Available Resources and Operations [operations] -->
## Available Resources and Operations

### [Miscellaneous](docs/sdks/miscellaneous/README.md)

* [getPublicInterstitial](docs/sdks/miscellaneous/README.md#getpublicinterstitial) - Returns the markup for the interstitial page

### [Jwks](docs/sdks/jwks/README.md)

* [getJWKS](docs/sdks/jwks/README.md#getjwks) - Retrieve the JSON Web Key Set of the instance

### [Clients](docs/sdks/clients/README.md)

* [~~getClientList~~](docs/sdks/clients/README.md#getclientlist) - List all clients :warning: **Deprecated**
* [verifyClient](docs/sdks/clients/README.md#verifyclient) - Verify a client
* [getClient](docs/sdks/clients/README.md#getclient) - Get a client

### [EmailAddresses](docs/sdks/emailaddresses/README.md)

* [createEmailAddress](docs/sdks/emailaddresses/README.md#createemailaddress) - Create an email address
* [getEmailAddress](docs/sdks/emailaddresses/README.md#getemailaddress) - Retrieve an email address
* [deleteEmailAddress](docs/sdks/emailaddresses/README.md#deleteemailaddress) - Delete an email address
* [updateEmailAddress](docs/sdks/emailaddresses/README.md#updateemailaddress) - Update an email address

### [PhoneNumbers](docs/sdks/phonenumbers/README.md)

* [createPhoneNumber](docs/sdks/phonenumbers/README.md#createphonenumber) - Create a phone number
* [getPhoneNumber](docs/sdks/phonenumbers/README.md#getphonenumber) - Retrieve a phone number
* [deletePhoneNumber](docs/sdks/phonenumbers/README.md#deletephonenumber) - Delete a phone number
* [updatePhoneNumber](docs/sdks/phonenumbers/README.md#updatephonenumber) - Update a phone number

### [Sessions](docs/sdks/sessions/README.md)

* [getSessionList](docs/sdks/sessions/README.md#getsessionlist) - List all sessions
* [getSession](docs/sdks/sessions/README.md#getsession) - Retrieve a session
* [revokeSession](docs/sdks/sessions/README.md#revokesession) - Revoke a session
* [~~verifySession~~](docs/sdks/sessions/README.md#verifysession) - Verify a session :warning: **Deprecated**
* [createSessionTokenFromTemplate](docs/sdks/sessions/README.md#createsessiontokenfromtemplate) - Create a session token from a jwt template

### [EmailAndSMSTemplates](docs/sdks/emailandsmstemplates/README.md)

* [getTemplateList](docs/sdks/emailandsmstemplates/README.md#gettemplatelist) - List all templates
* [getTemplate](docs/sdks/emailandsmstemplates/README.md#gettemplate) - Retrieve a template
* [upsertTemplate](docs/sdks/emailandsmstemplates/README.md#upserttemplate) - Update a template for a given type and slug
* [revertTemplate](docs/sdks/emailandsmstemplates/README.md#reverttemplate) - Revert a template
* [previewTemplate](docs/sdks/emailandsmstemplates/README.md#previewtemplate) - Preview changes to a template
* [toggleTemplateDelivery](docs/sdks/emailandsmstemplates/README.md#toggletemplatedelivery) - Toggle the delivery by Clerk for a template of a given type and slug

### [Users](docs/sdks/users/README.md)

* [getUserList](docs/sdks/users/README.md#getuserlist) - List all users
* [createUser](docs/sdks/users/README.md#createuser) - Create a new user
* [getUsersCount](docs/sdks/users/README.md#getuserscount) - Count users
* [getUser](docs/sdks/users/README.md#getuser) - Retrieve a user
* [updateUser](docs/sdks/users/README.md#updateuser) - Update a user
* [deleteUser](docs/sdks/users/README.md#deleteuser) - Delete a user
* [banUser](docs/sdks/users/README.md#banuser) - Ban a user
* [unbanUser](docs/sdks/users/README.md#unbanuser) - Unban a user
* [lockUser](docs/sdks/users/README.md#lockuser) - Lock a user
* [unlockUser](docs/sdks/users/README.md#unlockuser) - Unlock a user
* [setUserProfileImage](docs/sdks/users/README.md#setuserprofileimage) - Set user profile image
* [deleteUserProfileImage](docs/sdks/users/README.md#deleteuserprofileimage) - Delete user profile image
* [updateUserMetadata](docs/sdks/users/README.md#updateusermetadata) - Merge and update a user's metadata
* [getOAuthAccessToken](docs/sdks/users/README.md#getoauthaccesstoken) - Retrieve the OAuth access token of a user
* [usersGetOrganizationMemberships](docs/sdks/users/README.md#usersgetorganizationmemberships) - Retrieve all memberships for a user
* [verifyPassword](docs/sdks/users/README.md#verifypassword) - Verify the password of a user
* [verifyTOTP](docs/sdks/users/README.md#verifytotp) - Verify a TOTP or backup code for a user
* [disableMFA](docs/sdks/users/README.md#disablemfa) - Disable a user's MFA methods

### [Invitations](docs/sdks/invitations/README.md)

* [createInvitation](docs/sdks/invitations/README.md#createinvitation) - Create an invitation
* [listInvitations](docs/sdks/invitations/README.md#listinvitations) - List all invitations
* [revokeInvitation](docs/sdks/invitations/README.md#revokeinvitation) - Revokes an invitation

### [AllowListBlockList](docs/sdks/allowlistblocklist/README.md)

* [listAllowlistIdentifiers](docs/sdks/allowlistblocklist/README.md#listallowlistidentifiers) - List all identifiers on the allow-list
* [createAllowlistIdentifier](docs/sdks/allowlistblocklist/README.md#createallowlistidentifier) - Add identifier to the allow-list
* [deleteAllowlistIdentifier](docs/sdks/allowlistblocklist/README.md#deleteallowlistidentifier) - Delete identifier from allow-list
* [listBlocklistIdentifiers](docs/sdks/allowlistblocklist/README.md#listblocklistidentifiers) - List all identifiers on the block-list
* [createBlocklistIdentifier](docs/sdks/allowlistblocklist/README.md#createblocklistidentifier) - Add identifier to the block-list
* [deleteBlocklistIdentifier](docs/sdks/allowlistblocklist/README.md#deleteblocklistidentifier) - Delete identifier from block-list

### [BetaFeatures](docs/sdks/betafeatures/README.md)

* [updateInstanceAuthConfig](docs/sdks/betafeatures/README.md#updateinstanceauthconfig) - Update instance settings
* [~~updateProductionInstanceDomain~~](docs/sdks/betafeatures/README.md#updateproductioninstancedomain) - Update production instance domain :warning: **Deprecated**
* [changeProductionInstanceDomain](docs/sdks/betafeatures/README.md#changeproductioninstancedomain) - Update production instance domain

### [ActorTokens](docs/sdks/actortokens/README.md)

* [createActorToken](docs/sdks/actortokens/README.md#createactortoken) - Create actor token
* [revokeActorToken](docs/sdks/actortokens/README.md#revokeactortoken) - Revoke actor token

### [Domains](docs/sdks/domains/README.md)

* [listDomains](docs/sdks/domains/README.md#listdomains) - List all instance domains
* [addDomain](docs/sdks/domains/README.md#adddomain) - Add a domain
* [deleteDomain](docs/sdks/domains/README.md#deletedomain) - Delete a satellite domain
* [updateDomain](docs/sdks/domains/README.md#updatedomain) - Update a domain

### [InstanceSettings](docs/sdks/instancesettings/README.md)

* [updateInstance](docs/sdks/instancesettings/README.md#updateinstance) - Update instance settings
* [updateInstanceRestrictions](docs/sdks/instancesettings/README.md#updateinstancerestrictions) - Update instance restrictions
* [updateInstanceOrganizationSettings](docs/sdks/instancesettings/README.md#updateinstanceorganizationsettings) - Update instance organization settings

### [Webhooks](docs/sdks/webhooks/README.md)

* [createSvixApp](docs/sdks/webhooks/README.md#createsvixapp) - Create a Svix app
* [deleteSvixApp](docs/sdks/webhooks/README.md#deletesvixapp) - Delete a Svix app
* [generateSvixAuthURL](docs/sdks/webhooks/README.md#generatesvixauthurl) - Create a Svix Dashboard URL

### [JWTTemplates](docs/sdks/jwttemplates/README.md)

* [listJWTTemplates](docs/sdks/jwttemplates/README.md#listjwttemplates) - List all templates
* [createJWTTemplate](docs/sdks/jwttemplates/README.md#createjwttemplate) - Create a JWT template
* [getJWTTemplate](docs/sdks/jwttemplates/README.md#getjwttemplate) - Retrieve a template
* [updateJWTTemplate](docs/sdks/jwttemplates/README.md#updatejwttemplate) - Update a JWT template
* [deleteJWTTemplate](docs/sdks/jwttemplates/README.md#deletejwttemplate) - Delete a Template

### [Organizations](docs/sdks/organizations/README.md)

* [listOrganizations](docs/sdks/organizations/README.md#listorganizations) - Get a list of organizations for an instance
* [createOrganization](docs/sdks/organizations/README.md#createorganization) - Create an organization
* [getOrganization](docs/sdks/organizations/README.md#getorganization) - Retrieve an organization by ID or slug
* [updateOrganization](docs/sdks/organizations/README.md#updateorganization) - Update an organization
* [deleteOrganization](docs/sdks/organizations/README.md#deleteorganization) - Delete an organization
* [mergeOrganizationMetadata](docs/sdks/organizations/README.md#mergeorganizationmetadata) - Merge and update metadata for an organization
* [uploadOrganizationLogo](docs/sdks/organizations/README.md#uploadorganizationlogo) - Upload a logo for the organization
* [deleteOrganizationLogo](docs/sdks/organizations/README.md#deleteorganizationlogo) - Delete the organization's logo.

### [OrganizationInvitations](docs/sdks/organizationinvitations/README.md)

* [createOrganizationInvitation](docs/sdks/organizationinvitations/README.md#createorganizationinvitation) - Create and send an organization invitation
* [listOrganizationInvitations](docs/sdks/organizationinvitations/README.md#listorganizationinvitations) - Get a list of organization invitations
* [createOrganizationInvitationBulk](docs/sdks/organizationinvitations/README.md#createorganizationinvitationbulk) - Bulk create and send organization invitations
* [~~listPendingOrganizationInvitations~~](docs/sdks/organizationinvitations/README.md#listpendingorganizationinvitations) - Get a list of pending organization invitations :warning: **Deprecated**
* [getOrganizationInvitation](docs/sdks/organizationinvitations/README.md#getorganizationinvitation) - Retrieve an organization invitation by ID
* [revokeOrganizationInvitation](docs/sdks/organizationinvitations/README.md#revokeorganizationinvitation) - Revoke a pending organization invitation

### [OrganizationMemberships](docs/sdks/organizationmemberships/README.md)

* [createOrganizationMembership](docs/sdks/organizationmemberships/README.md#createorganizationmembership) - Create a new organization membership
* [listOrganizationMemberships](docs/sdks/organizationmemberships/README.md#listorganizationmemberships) - Get a list of all members of an organization
* [updateOrganizationMembership](docs/sdks/organizationmemberships/README.md#updateorganizationmembership) - Update an organization membership
* [deleteOrganizationMembership](docs/sdks/organizationmemberships/README.md#deleteorganizationmembership) - Remove a member from an organization
* [updateOrganizationMembershipMetadata](docs/sdks/organizationmemberships/README.md#updateorganizationmembershipmetadata) - Merge and update organization membership metadata

### [ProxyChecks](docs/sdks/proxychecks/README.md)

* [verifyDomainProxy](docs/sdks/proxychecks/README.md#verifydomainproxy) - Verify the proxy configuration for your domain

### [RedirectURLs](docs/sdks/redirecturls/README.md)

* [listRedirectURLs](docs/sdks/redirecturls/README.md#listredirecturls) - List all redirect URLs
* [createRedirectURL](docs/sdks/redirecturls/README.md#createredirecturl) - Create a redirect URL
* [getRedirectURL](docs/sdks/redirecturls/README.md#getredirecturl) - Retrieve a redirect URL
* [deleteRedirectURL](docs/sdks/redirecturls/README.md#deleteredirecturl) - Delete a redirect URL

### [SignInTokens](docs/sdks/signintokens/README.md)

* [createSignInToken](docs/sdks/signintokens/README.md#createsignintoken) - Create sign-in token
* [revokeSignInToken](docs/sdks/signintokens/README.md#revokesignintoken) - Revoke the given sign-in token

### [SignUps](docs/sdks/signups/README.md)

* [updateSignUp](docs/sdks/signups/README.md#updatesignup) - Update a sign-up

### [OAuthApplications](docs/sdks/oauthapplications/README.md)

* [listOAuthApplications](docs/sdks/oauthapplications/README.md#listoauthapplications) - Get a list of OAuth applications for an instance
* [createOAuthApplication](docs/sdks/oauthapplications/README.md#createoauthapplication) - Create an OAuth application
* [getOAuthApplication](docs/sdks/oauthapplications/README.md#getoauthapplication) - Retrieve an OAuth application by ID
* [updateOAuthApplication](docs/sdks/oauthapplications/README.md#updateoauthapplication) - Update an OAuth application
* [deleteOAuthApplication](docs/sdks/oauthapplications/README.md#deleteoauthapplication) - Delete an OAuth application
* [rotateOAuthApplicationSecret](docs/sdks/oauthapplications/README.md#rotateoauthapplicationsecret) - Rotate the client secret of the given OAuth application

### [SAMLConnections](docs/sdks/samlconnections/README.md)

* [listSAMLConnections](docs/sdks/samlconnections/README.md#listsamlconnections) - Get a list of SAML Connections for an instance
* [createSAMLConnection](docs/sdks/samlconnections/README.md#createsamlconnection) - Create a SAML Connection
* [getSAMLConnection](docs/sdks/samlconnections/README.md#getsamlconnection) - Retrieve a SAML Connection by ID
* [updateSAMLConnection](docs/sdks/samlconnections/README.md#updatesamlconnection) - Update a SAML Connection
* [deleteSAMLConnection](docs/sdks/samlconnections/README.md#deletesamlconnection) - Delete a SAML Connection

### [TestingTokens](docs/sdks/testingtokens/README.md)

* [createTestingToken](docs/sdks/testingtokens/README.md#createtestingtoken) - Retrieve a new testing token
<!-- End Available Resources and Operations [operations] -->

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

<!-- Placeholder for Future Speakeasy SDK Sections -->

# Development

## Maturity

This SDK is in beta, and there may be breaking changes between versions without a major version update. Therefore, we recommend pinning usage
to a specific package version. This way, you can install the same version each time without breaking changes unless you are intentionally
looking for the latest version.

## Contributions

While we value open-source contributions to this SDK, this library is generated programmatically.
Feel free to open a PR or a Github issue as a proof of concept and we'll do our best to include it in a future release!

### SDK Created by [Speakeasy](https://docs.speakeasyapi.dev/docs/using-speakeasy/client-sdks)
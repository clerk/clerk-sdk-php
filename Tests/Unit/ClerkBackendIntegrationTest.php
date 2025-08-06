<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Integration;

use PHPUnit\Framework\TestCase;
use Clerk\Backend\ClerkBackend;

class ClerkBackendIntegrationTest extends TestCase
{
    public function testFullSdkInitialization(): void
    {
        $clerkBackend = ClerkBackend::builder()
            ->setSecurity('sk_test_fake_key_for_testing')
            ->setServerUrl('https://api.clerk.com/v1')
            ->build();

        // Test that all services are properly initialized
        $this->assertInstanceOf(\Clerk\Backend\Users::class, $clerkBackend->users);
        $this->assertInstanceOf(\Clerk\Backend\Sessions::class, $clerkBackend->sessions);
        $this->assertInstanceOf(\Clerk\Backend\Organizations::class, $clerkBackend->organizations);
        $this->assertInstanceOf(\Clerk\Backend\Jwks::class, $clerkBackend->jwks);
        $this->assertInstanceOf(\Clerk\Backend\Webhooks::class, $clerkBackend->webhooks);
        $this->assertInstanceOf(\Clerk\Backend\Invitations::class, $clerkBackend->invitations);
        $this->assertInstanceOf(\Clerk\Backend\Clients::class, $clerkBackend->clients);
        $this->assertInstanceOf(\Clerk\Backend\EmailAddresses::class, $clerkBackend->emailAddresses);
        $this->assertInstanceOf(\Clerk\Backend\PhoneNumbers::class, $clerkBackend->phoneNumbers);
        $this->assertInstanceOf(\Clerk\Backend\Domains::class, $clerkBackend->domains);
        $this->assertInstanceOf(\Clerk\Backend\InstanceSettings::class, $clerkBackend->instanceSettings);
        $this->assertInstanceOf(\Clerk\Backend\JwtTemplates::class, $clerkBackend->jwtTemplates);
        $this->assertInstanceOf(\Clerk\Backend\OrganizationMemberships::class, $clerkBackend->organizationMemberships);
        $this->assertInstanceOf(\Clerk\Backend\OrganizationInvitations::class, $clerkBackend->organizationInvitations);
        $this->assertInstanceOf(\Clerk\Backend\OrganizationDomains::class, $clerkBackend->organizationDomains);
        $this->assertInstanceOf(\Clerk\Backend\AllowlistIdentifiers::class, $clerkBackend->allowlistIdentifiers);
        $this->assertInstanceOf(\Clerk\Backend\BlocklistIdentifiers::class, $clerkBackend->blocklistIdentifiers);
        $this->assertInstanceOf(\Clerk\Backend\BetaFeatures::class, $clerkBackend->betaFeatures);
        $this->assertInstanceOf(\Clerk\Backend\ActorTokens::class, $clerkBackend->actorTokens);
        $this->assertInstanceOf(\Clerk\Backend\ProxyChecks::class, $clerkBackend->proxyChecks);
        $this->assertInstanceOf(\Clerk\Backend\RedirectUrls::class, $clerkBackend->redirectUrls);
        $this->assertInstanceOf(\Clerk\Backend\SignInTokens::class, $clerkBackend->signInTokens);
        $this->assertInstanceOf(\Clerk\Backend\SignUps::class, $clerkBackend->signUps);
        $this->assertInstanceOf(\Clerk\Backend\OauthApplications::class, $clerkBackend->oauthApplications);
        $this->assertInstanceOf(\Clerk\Backend\SamlConnections::class, $clerkBackend->samlConnections);
        $this->assertInstanceOf(\Clerk\Backend\TestingTokens::class, $clerkBackend->testingTokens);
        $this->assertInstanceOf(\Clerk\Backend\WaitlistEntries::class, $clerkBackend->waitlistEntries);
        $this->assertInstanceOf(\Clerk\Backend\Miscellaneous::class, $clerkBackend->miscellaneous);
    }

    public function testBuilderFluentInterface(): void
    {
        $builder = ClerkBackend::builder()
            ->setSecurity('sk_test_fake_key')
            ->setServerUrl('https://api.clerk.com/v1')
            ->setServerIndex(0);

        $this->assertInstanceOf(\Clerk\Backend\ClerkBackendBuilder::class, $builder);
        
        $clerkBackend = $builder->build();
        $this->assertInstanceOf(ClerkBackend::class, $clerkBackend);
    }

}

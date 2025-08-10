<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Clerk\Backend\ClerkBackend;

class ClerkBackendTest extends TestCase
{
    public function testBuilderReturnsClerkBackendBuilder(): void
    {
        $builder = ClerkBackend::builder();
        
        $this->assertInstanceOf(\Clerk\Backend\ClerkBackendBuilder::class, $builder);
    }

    public function testCanCreateClerkBackendInstance(): void
    {
        $clerkBackend = ClerkBackend::builder()->build();
        
        $this->assertInstanceOf(ClerkBackend::class, $clerkBackend);
    }

    public function testAllServicesAreInitialized(): void
    {
        $clerkBackend = ClerkBackend::builder()->build();
        
        // Test core services
        $this->assertNotNull($clerkBackend->users);
        $this->assertNotNull($clerkBackend->sessions);
        $this->assertNotNull($clerkBackend->organizations);
        $this->assertNotNull($clerkBackend->jwks);
        $this->assertNotNull($clerkBackend->clients);
        $this->assertNotNull($clerkBackend->invitations);
        $this->assertNotNull($clerkBackend->webhooks);
    }

    public function testSdkConfigurationIsAccessible(): void
    {
        $clerkBackend = ClerkBackend::builder()->build();
        
        $this->assertNotNull($clerkBackend->sdkConfiguration);
        $this->assertInstanceOf(\Clerk\Backend\SDKConfiguration::class, $clerkBackend->sdkConfiguration);
    }

    public function testServersConstantIsCorrect(): void
    {
        $expectedServers = ['https://api.clerk.com/v1'];
        
        $this->assertEquals($expectedServers, ClerkBackend::SERVERS);
    }
}

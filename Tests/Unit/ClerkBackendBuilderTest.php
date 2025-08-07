<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Clerk\Backend\ClerkBackendBuilder;
use Clerk\Backend\ClerkBackend;
use GuzzleHttp\Client;

class ClerkBackendBuilderTest extends TestCase
{
    public function testBuilderCanBeCreated(): void
    {
        $builder = new ClerkBackendBuilder();
        
        $this->assertInstanceOf(ClerkBackendBuilder::class, $builder);
    }

    public function testBuilderCanSetSecurity(): void
    {
        $builder = new ClerkBackendBuilder();
        $bearerToken = 'sk_test_1234567890';
        
        $result = $builder->setSecurity($bearerToken);
        
        $this->assertInstanceOf(ClerkBackendBuilder::class, $result);
        $this->assertSame($builder, $result); // Should return same instance for chaining
    }

    public function testBuilderCanSetServerUrl(): void
    {
        $builder = new ClerkBackendBuilder(); 
        $serverUrl = 'https://custom-api.example.com';
        
        $result = $builder->setServerUrl($serverUrl);
        
        $this->assertInstanceOf(ClerkBackendBuilder::class, $result);
        $this->assertSame($builder, $result);
    }

    public function testBuilderCanSetClient(): void
    {
        $builder = new ClerkBackendBuilder();
        $client = new Client();
        
        $result = $builder->setClient($client);
        
        $this->assertInstanceOf(ClerkBackendBuilder::class, $result);
        $this->assertSame($builder, $result);
    }

    public function testBuilderCanSetServerIndex(): void
    {
        $builder = new ClerkBackendBuilder();
        
        $result = $builder->setServerIndex(0);
        
        $this->assertInstanceOf(ClerkBackendBuilder::class, $result);
        $this->assertSame($builder, $result);
    }

    public function testBuilderCanSetSecuritySource(): void
    {
        $builder = new ClerkBackendBuilder();
        $securitySource = function() { return 'sk_test_dynamic_token'; };
        
        $result = $builder->setSecuritySource($securitySource);
        
        $this->assertInstanceOf(ClerkBackendBuilder::class, $result);
        $this->assertSame($builder, $result);
    }

    public function testBuilderCanBuildClerkBackend(): void
    {
        $builder = new ClerkBackendBuilder();
        
        $clerkBackend = $builder->build();
        
        $this->assertInstanceOf(ClerkBackend::class, $clerkBackend);
    }

    public function testBuilderMethodChaining(): void
    {
        $builder = new ClerkBackendBuilder();
        
        $result = $builder
            ->setSecurity('sk_test_1234567890')
            ->setServerUrl('https://api.clerk.com/v1')
            ->setServerIndex(0);
        
        $this->assertInstanceOf(ClerkBackendBuilder::class, $result);
        $this->assertSame($builder, $result);
    }

    public function testBuilderCanBuildWithConfiguration(): void
    {
        $clerkBackend = (new ClerkBackendBuilder())
            ->setSecurity('sk_test_1234567890')
            ->setServerUrl('https://api.clerk.com/v1')
            ->build();
        
        $this->assertInstanceOf(ClerkBackend::class, $clerkBackend);
        $this->assertNotNull($clerkBackend->users);
        $this->assertNotNull($clerkBackend->sessions);
    }
}
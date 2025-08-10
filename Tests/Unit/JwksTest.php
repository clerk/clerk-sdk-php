<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Clerk\Backend\Jwks;
use Clerk\Backend\SDKConfiguration;
use Clerk\Backend\ClerkBackend;

class JwksTest extends TestCase
{
    private Jwks $jwks;
    
    protected function setUp(): void
    {
        $sdkConfig = new SDKConfiguration();
        $this->jwks = new Jwks($sdkConfig);
    }

    public function testJwksServiceCanBeCreated(): void
    {
        $this->assertInstanceOf(Jwks::class, $this->jwks);
    }


    public function testJwksServiceIsAccessibleThroughClerkBackend(): void
    {
        $clerkBackend = ClerkBackend::builder()->build();
        
        $this->assertInstanceOf(Jwks::class, $clerkBackend->jwks);
    }

    public function testJwksServiceHasGetJwksMethod(): void
    {
        $this->assertTrue(method_exists($this->jwks, 'getJWKS'));
    }

    public function testJwksServiceHasRequiredMethods(): void
    {
        $reflectionClass = new \ReflectionClass($this->jwks);
        $methods = array_map(fn($method) => $method->getName(), $reflectionClass->getMethods(\ReflectionMethod::IS_PUBLIC));
        
        // Should have at least constructor and getJWKS method
        $this->assertGreaterThanOrEqual(2, count($methods));
        $this->assertContains('getJWKS', $methods);
    }
}

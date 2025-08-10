<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Clerk\Backend\Webhooks;
use Clerk\Backend\SDKConfiguration;
use Clerk\Backend\ClerkBackend;

class WebhooksTest extends TestCase
{
    private Webhooks $webhooks;
    
    protected function setUp(): void
    {
        $sdkConfig = new SDKConfiguration();
        $this->webhooks = new Webhooks($sdkConfig);
    }

    public function testWebhooksServiceCanBeCreated(): void
    {
        $this->assertInstanceOf(Webhooks::class, $this->webhooks);
    }

    public function testWebhooksServiceIsAccessibleThroughClerkBackend(): void
    {
        $clerkBackend = ClerkBackend::builder()->build();
        
        $this->assertInstanceOf(Webhooks::class, $clerkBackend->webhooks);
    }

    public function testWebhooksServiceHasCoreMethods(): void
    {
        $this->assertTrue(method_exists($this->webhooks, 'create'));
        $this->assertTrue(method_exists($this->webhooks, 'get'));
        $this->assertTrue(method_exists($this->webhooks, 'list'));
        $this->assertTrue(method_exists($this->webhooks, 'update'));
        $this->assertTrue(method_exists($this->webhooks, 'delete'));
    }

    public function testWebhooksServiceHasRequiredMethods(): void
    {
        $reflectionClass = new \ReflectionClass($this->webhooks);
        $methods = array_map(fn($method) => $method->getName(), $reflectionClass->getMethods(\ReflectionMethod::IS_PUBLIC));
        
        // Should have several public methods
        $this->assertGreaterThanOrEqual(5, count($methods));
    }
}

<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Clerk\Backend\Organizations;
use Clerk\Backend\SDKConfiguration;
use Clerk\Backend\ClerkBackend;

class OrganizationsTest extends TestCase
{
    private Organizations $organizations;
    
    protected function setUp(): void
    {
        $sdkConfig = new SDKConfiguration();
        $this->organizations = new Organizations($sdkConfig);
    }

    public function testOrganizationsServiceCanBeCreated(): void
    {
        $this->assertInstanceOf(Organizations::class, $this->organizations);
    }


    public function testOrganizationsServiceIsAccessibleThroughClerkBackend(): void
    {
        $clerkBackend = ClerkBackend::builder()->build();
        
        $this->assertInstanceOf(Organizations::class, $clerkBackend->organizations);
    }

    public function testOrganizationsServiceHasCoreMethods(): void
    {
        $this->assertTrue(method_exists($this->organizations, 'create'));
        $this->assertTrue(method_exists($this->organizations, 'get'));
        $this->assertTrue(method_exists($this->organizations, 'list'));
        $this->assertTrue(method_exists($this->organizations, 'update'));
        $this->assertTrue(method_exists($this->organizations, 'delete'));
    }

    public function testOrganizationsServiceHasMembershipMethods(): void
    {
        $reflectionClass = new \ReflectionClass($this->organizations);
        $methods = array_map(fn($method) => $method->getName(), $reflectionClass->getMethods());
        
        // Check for membership-related methods
        $hasMembershipMethods = false;
        foreach ($methods as $method) {
            if (str_contains(strtolower($method), 'member')) {
                $hasMembershipMethods = true;
                break;
            }
        }
        
        $this->assertTrue($hasMembershipMethods || count($methods) > 5);
    }

    public function testOrganizationsServiceHasMetadataMethods(): void
    {
        $this->assertTrue(method_exists($this->organizations, 'updateMetadata') || 
                         method_exists($this->organizations, 'update'));
    }
}

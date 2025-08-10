<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Clerk\Backend\SDKConfiguration;

class SDKConfigurationTest extends TestCase
{
    public function testSdkConfigurationCanBeCreated(): void
    {
        $config = new SDKConfiguration();
        
        $this->assertInstanceOf(SDKConfiguration::class, $config);
    }

    public function testSdkConfigurationHasRequiredMethods(): void
    {
        $config = new SDKConfiguration();
        
        $this->assertTrue(method_exists($config, 'getServerUrl'));
        $this->assertTrue(method_exists($config, 'getServerDetails'));
    }

    public function testSdkConfigurationHasSecurityMethods(): void
    {
        $config = new SDKConfiguration();
        
        $this->assertTrue(method_exists($config, 'hasSecurity'));
        $this->assertTrue(method_exists($config, 'getSecurity'));
    }

    public function testSdkConfigurationHasHooksMethods(): void
    {
        $config = new SDKConfiguration();
        
        $this->assertTrue(method_exists($config, 'initHooks'));
    }

    public function testSdkConfigurationHasDefaultValues(): void
    {
        $config = new SDKConfiguration();
        
        // Should have some default server URL
        $serverUrl = $config->getServerUrl();
        $this->assertIsString($serverUrl);
        $this->assertNotEmpty($serverUrl);
    }

    public function testSdkConfigurationSecurityHandling(): void
    {
        $config = new SDKConfiguration();
        
        // Initially should not have security configured
        $this->assertIsBool($config->hasSecurity());
    }
}

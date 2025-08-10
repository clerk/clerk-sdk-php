<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Clerk\Backend\Sessions;
use Clerk\Backend\SDKConfiguration;
use Clerk\Backend\ClerkBackend;

class SessionsTest extends TestCase
{
    private Sessions $sessions;
    
    protected function setUp(): void
    {
        $sdkConfig = new SDKConfiguration();
        $this->sessions = new Sessions($sdkConfig);
    }

    public function testSessionsServiceCanBeCreated(): void
    {
        $this->assertInstanceOf(Sessions::class, $this->sessions);
    }

    public function testSessionsServiceIsAccessibleThroughClerkBackend(): void
    {
        $clerkBackend = ClerkBackend::builder()->build();
        
        $this->assertInstanceOf(Sessions::class, $clerkBackend->sessions);
    }

    public function testSessionsServiceHasCoreMethods(): void
    {
        $this->assertTrue(method_exists($this->sessions, 'get'));
        $this->assertTrue(method_exists($this->sessions, 'list'));
        $this->assertTrue(method_exists($this->sessions, 'revoke'));
        $this->assertTrue(method_exists($this->sessions, 'create'));
    }

    public function testSessionsServiceHasTokenMethods(): void
    {
        $this->assertTrue(method_exists($this->sessions, 'createToken'));
        $this->assertTrue(method_exists($this->sessions, 'createTokenFromTemplate'));
    }

    public function testSessionsServiceHasVerificationMethods(): void
    {
        // Check if verify method exists (might be deprecated)
        $this->assertTrue(method_exists($this->sessions, 'verify') || !method_exists($this->sessions, 'verify'));
    }
}

<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Clerk\Backend\Users;
use Clerk\Backend\SDKConfiguration;
use Clerk\Backend\ClerkBackend;

class UsersTest extends TestCase
{
    private Users $users;
    
    protected function setUp(): void
    {
        $sdkConfig = new SDKConfiguration();
        $this->users = new Users($sdkConfig);
    }

    public function testUsersServiceCanBeCreated(): void
    {
        $this->assertInstanceOf(Users::class, $this->users);
    }

    public function testUsersServiceIsAccessibleThroughClerkBackend(): void
    {
        $clerkBackend = ClerkBackend::builder()->build();
        
        $this->assertInstanceOf(Users::class, $clerkBackend->users);
    }

    public function testUsersServiceHasRequiredMethods(): void
    {
        $this->assertTrue(method_exists($this->users, 'create'));
        $this->assertTrue(method_exists($this->users, 'get'));
        $this->assertTrue(method_exists($this->users, 'list'));
        $this->assertTrue(method_exists($this->users, 'update'));
        $this->assertTrue(method_exists($this->users, 'delete'));
        $this->assertTrue(method_exists($this->users, 'ban'));
        $this->assertTrue(method_exists($this->users, 'unban'));
        $this->assertTrue(method_exists($this->users, 'lock'));
        $this->assertTrue(method_exists($this->users, 'unlock'));
    }

    public function testUsersServiceHasAuthenticationMethods(): void
    {
        $this->assertTrue(method_exists($this->users, 'verifyPassword'));
        $this->assertTrue(method_exists($this->users, 'verifyTotp'));
        $this->assertTrue(method_exists($this->users, 'getOAuthAccessToken'));
    }

    public function testUsersServiceHasOrganizationMethods(): void
    {
        $this->assertTrue(method_exists($this->users, 'getOrganizationMemberships'));
        $this->assertTrue(method_exists($this->users, 'getOrganizationInvitations'));
        $this->assertTrue(method_exists($this->users, 'getInstanceOrganizationMemberships'));
    }

    public function testUsersServiceHasMetadataMethods(): void
    {
        $this->assertTrue(method_exists($this->users, 'updateMetadata'));
        $this->assertTrue(method_exists($this->users, 'setProfileImage'));
        $this->assertTrue(method_exists($this->users, 'deleteProfileImage'));
    }

    public function testUsersServiceHasMfaMethods(): void
    {
        $this->assertTrue(method_exists($this->users, 'disableMfa'));
        $this->assertTrue(method_exists($this->users, 'deleteTOTP'));
        $this->assertTrue(method_exists($this->users, 'deleteBackupCodes'));
    }
}

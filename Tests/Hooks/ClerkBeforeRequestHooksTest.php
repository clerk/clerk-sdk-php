<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Hooks;

use Clerk\Backend\Hooks\BeforeRequestContext;
use Clerk\Backend\Hooks\ClerkBeforeRequestHooks;
use Clerk\Backend\Hooks\HookContext;

use PHPUnit\Framework\TestCase;

use Psr\Http\Message\RequestInterface;

final class ClerkBeforeRequestHooksTest extends TestCase
{
    public function test_adds_api_version_header(): void
    {
        // Create a mock for the RequestInterface
        $request = $this->createMock(RequestInterface::class);
        
        // Set up the mock to expect withHeader to be called with the correct parameters
        $request->expects($this->once())
            ->method('withHeader')
            ->with(
                $this->equalTo('Clerk-API-Version'),
                $this->equalTo('2024-10-01')
            )
            ->willReturnSelf();
        
        // Create a mock for the HookContext
        $hookContext = new HookContext('test_operation', null, null);
        
        // Create the BeforeRequestContext with the HookContext
        $context = new BeforeRequestContext($hookContext);
        
        // Create the hook instance
        $hook = new ClerkBeforeRequestHooks();
        
        // Call the beforeRequest method
        $result = $hook->beforeRequest($context, $request);
        
        // Assert that the result is the same as the request (since we configured the mock to return itself)
        $this->assertSame($request, $result);
    }
}
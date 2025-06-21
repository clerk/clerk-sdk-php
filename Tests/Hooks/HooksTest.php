<?php

namespace Clerk\Backend\Tests\Hooks;

require 'vendor/autoload.php';

use Clerk\Backend;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;

use PHPUnit\Framework\TestCase;

class HooksTest extends TestCase
{
    private $apiVersion = '2024-10-01';

    public function testGetJwksWithApiVersionHeader(): void
    {
        // Create a container to capture the request
        $container = [];
        $history = Middleware::history($container);

        // Create a mock response
        $mockResponse = new Response(
          200, 
          ['Content-Type' => 'application/json'], 
          json_encode([
            'keys' => []
          ])
        );
        
        $mock = new MockHandler([$mockResponse]);
        $handlerStack = HandlerStack::create($mock);
        $handlerStack->push($history);
        
        // Create a client with the mock handler
        $client = new Client(['handler' => $handlerStack]);
        
        // Create SDK with the mock
        $sdk = Backend\ClerkBackend::builder()
            ->setSecurity('sk_test_foo')
            ->setClient($client)
            ->build();

        $sdk->jwks->getJWKS();
                
        // Assert we made exactly one request
        $this->assertCount(1, $container);
        
        // Get the request from the container
        $request = $container[0]['request'];

        // Assert the Clerk-API-Version header was set correctly
        $this->assertTrue($request->hasHeader('Clerk-API-Version'));
        $this->assertEquals($this->apiVersion, $request->getHeaderLine('Clerk-API-Version'));
    }
}

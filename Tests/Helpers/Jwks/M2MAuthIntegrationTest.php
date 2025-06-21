<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Helpers\Jwks;

use Clerk\Backend\Helpers\Jwks\AuthenticateRequest;
use Clerk\Backend\Helpers\Jwks\AuthenticateRequestOptions;
use Clerk\Backend\Helpers\Jwks\AuthErrorReason;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

final class M2MAuthIntegrationTest extends TestCase
{
    private JwksHelpersFixture $fixture;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fixture = new JwksHelpersFixture();
    }

    /**
     * @requires CLERK_SECRET_KEY
     * @requires CLERK_MACHINE_TOKEN
     */
    public function test_real_machine_token_authentication()
    {
        if (! $this->fixture->enableRealIntegrationTests) {
            $this->markTestSkipped('Real integration tests are disabled. Set ENABLE_REAL_INTEGRATION_TESTS=true to enable.');
        }

        if (empty($this->fixture->machineToken)) {
            $this->markTestSkipped('CLERK_MACHINE_TOKEN environment variable is not set.');
        }

        $arOptions = new AuthenticateRequestOptions(
            secretKey: $this->fixture->secretKey,
            acceptsToken: ['machine_token']
        );

        $request = new Request('GET', $this->fixture->requestUrl, [
            'Authorization' => 'Bearer '.$this->fixture->machineToken,
        ]);

        $state = AuthenticateRequest::authenticateRequest($request, $arOptions);

        // Should not be rejected due to token type
        $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $state->getErrorReason());

        // If verification fails, it should be due to token validation, not type checking
        if ($state->isSignedOut()) {
            $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $state->getErrorReason());
        }
    }

    /**
     * @requires CLERK_SECRET_KEY
     * @requires CLERK_OAUTH_TOKEN
     */
    public function test_real_oauth_token_authentication()
    {
        if (! $this->fixture->enableRealIntegrationTests) {
            $this->markTestSkipped('Real integration tests are disabled. Set ENABLE_REAL_INTEGRATION_TESTS=true to enable.');
        }

        if (empty($this->fixture->oauthToken)) {
            $this->markTestSkipped('CLERK_OAUTH_TOKEN environment variable is not set.');
        }

        $arOptions = new AuthenticateRequestOptions(
            secretKey: $this->fixture->secretKey,
            acceptsToken: ['oauth_token']
        );

        $request = new Request('GET', $this->fixture->requestUrl, [
            'Authorization' => 'Bearer '.$this->fixture->oauthToken,
        ]);

        $state = AuthenticateRequest::authenticateRequest($request, $arOptions);

        // Should not be rejected due to token type
        $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $state->getErrorReason());

        // If verification fails, it should be due to token validation, not type checking
        if ($state->isSignedOut()) {
            $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $state->getErrorReason());
        }
    }

    /**
     * @requires CLERK_SECRET_KEY
     * @requires CLERK_API_KEY
     */
    public function test_real_api_key_authentication()
    {
        if (! $this->fixture->enableRealIntegrationTests) {
            $this->markTestSkipped('Real integration tests are disabled. Set ENABLE_REAL_INTEGRATION_TESTS=true to enable.');
        }

        if (empty($this->fixture->apiKey)) {
            $this->markTestSkipped('CLERK_API_KEY environment variable is not set.');
        }

        $arOptions = new AuthenticateRequestOptions(
            secretKey: $this->fixture->secretKey,
            acceptsToken: ['api_key']
        );

        $request = new Request('GET', $this->fixture->requestUrl, [
            'Authorization' => 'Bearer '.$this->fixture->apiKey,
        ]);

        $state = AuthenticateRequest::authenticateRequest($request, $arOptions);

        // Should not be rejected due to token type
        $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $state->getErrorReason());

        // If verification fails, it should be due to token validation, not type checking
        if ($state->isSignedOut()) {
            $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $state->getErrorReason());
        }
    }

    /**
     * @requires CLERK_SECRET_KEY
     * @requires CLERK_MACHINE_TOKEN
     * @requires CLERK_SESSION_TOKEN
     */
    public function test_hybrid_authentication_with_real_tokens()
    {
        if (! $this->fixture->enableRealIntegrationTests) {
            $this->markTestSkipped('Real integration tests are disabled. Set ENABLE_REAL_INTEGRATION_TESTS=true to enable.');
        }

        if (empty($this->fixture->machineToken) || empty($this->fixture->sessionToken)) {
            $this->markTestSkipped('CLERK_MACHINE_TOKEN or CLERK_SESSION_TOKEN environment variables are not set.');
        }

        $arOptions = new AuthenticateRequestOptions(
            secretKey: $this->fixture->secretKey,
            acceptsToken: ['machine_token', 'session_token']
        );

        // Test machine token
        $m2mRequest = new Request('GET', $this->fixture->requestUrl, [
            'Authorization' => 'Bearer '.$this->fixture->machineToken,
        ]);

        $m2mState = AuthenticateRequest::authenticateRequest($m2mRequest, $arOptions);
        $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $m2mState->getErrorReason());

        // Test session token
        $sessionRequest = new Request('GET', $this->fixture->requestUrl, [
            'Authorization' => 'Bearer '.$this->fixture->sessionToken,
        ]);

        $sessionState = AuthenticateRequest::authenticateRequest($sessionRequest, $arOptions);
        $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $sessionState->getErrorReason());
    }

    /**
     * @requires CLERK_SECRET_KEY
     * @requires CLERK_MACHINE_TOKEN
     */
    public function test_machine_token_rejected_when_not_accepted()
    {
        if (! $this->fixture->enableRealIntegrationTests) {
            $this->markTestSkipped('Real integration tests are disabled. Set ENABLE_REAL_INTEGRATION_TESTS=true to enable.');
        }

        if (empty($this->fixture->machineToken)) {
            $this->markTestSkipped('CLERK_MACHINE_TOKEN environment variable is not set.');
        }

        // Only accept session tokens
        $arOptions = new AuthenticateRequestOptions(
            secretKey: $this->fixture->secretKey,
            acceptsToken: ['session_token']
        );

        $request = new Request('GET', $this->fixture->requestUrl, [
            'Authorization' => 'Bearer '.$this->fixture->machineToken,
        ]);

        $state = AuthenticateRequest::authenticateRequest($request, $arOptions);

        // Should be rejected due to token type
        $this->assertEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $state->getErrorReason());
    }

    /**
     * @requires CLERK_SECRET_KEY
     * @requires CLERK_SESSION_TOKEN
     */
    public function test_session_token_rejected_when_only_m2m_accepted()
    {
        if (! $this->fixture->enableRealIntegrationTests) {
            $this->markTestSkipped('Real integration tests are disabled. Set ENABLE_REAL_INTEGRATION_TESTS=true to enable.');
        }

        if (empty($this->fixture->sessionToken)) {
            $this->markTestSkipped('CLERK_SESSION_TOKEN environment variable is not set.');
        }

        // Only accept machine tokens
        $arOptions = new AuthenticateRequestOptions(
            secretKey: $this->fixture->secretKey,
            acceptsToken: ['machine_token']
        );

        $request = new Request('GET', $this->fixture->requestUrl, [
            'Authorization' => 'Bearer '.$this->fixture->sessionToken,
        ]);

        $state = AuthenticateRequest::authenticateRequest($request, $arOptions);

        // Should be rejected due to token type
        $this->assertEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $state->getErrorReason());
    }

    /**
     * @requires CLERK_SECRET_KEY
     * @requires CLERK_MACHINE_TOKEN
     */
    public function test_machine_token_requires_secret_key_integration()
    {
        if (! $this->fixture->enableRealIntegrationTests) {
            $this->markTestSkipped('Real integration tests are disabled. Set ENABLE_REAL_INTEGRATION_TESTS=true to enable.');
        }

        if (empty($this->fixture->machineToken)) {
            $this->markTestSkipped('CLERK_MACHINE_TOKEN environment variable is not set.');
        }

        // Try to use JWT key only for machine token
        $arOptions = new AuthenticateRequestOptions(
            jwtKey: $this->fixture->jwtKey,
            acceptsToken: ['machine_token']
        );

        $request = new Request('GET', $this->fixture->requestUrl, [
            'Authorization' => 'Bearer '.$this->fixture->machineToken,
        ]);

        $state = AuthenticateRequest::authenticateRequest($request, $arOptions);

        // Should fail due to missing secret key
        $this->assertEquals(AuthErrorReason::$SECRET_KEY_MISSING, $state->getErrorReason());
    }
}
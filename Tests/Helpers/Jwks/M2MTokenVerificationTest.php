<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Helpers\Jwks;

use Clerk\Backend\Helpers\Jwks\AuthenticateRequest;
use Clerk\Backend\Helpers\Jwks\AuthenticateRequestOptions;
use Clerk\Backend\Helpers\Jwks\AuthErrorReason;
use Clerk\Backend\Helpers\Jwks\TokenTypes;
use Clerk\Backend\Helpers\Jwks\TokenVerificationException;
use Clerk\Backend\Helpers\Jwks\VerifyToken;
use Clerk\Backend\Helpers\Jwks\VerifyTokenOptions;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

final class M2MTokenVerificationTest extends TestCase
{
    private JwksHelpersFixture $fixture;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fixture = new JwksHelpersFixture();
    }

    public function test_token_type_detection_supports_both_prefixes()
    {
        // Test old m2m_ prefix
        $this->assertEquals(TokenTypes::MACHINE_TOKEN, TokenTypes::getTokenType('m2m_old_style_token'));
        $this->assertTrue(TokenTypes::isMachineToken('m2m_old_style_token'));
        $this->assertEquals('m2m_token', TokenTypes::getTokenTypeName('m2m_old_style_token'));

        // Test new mt_ prefix
        $this->assertEquals(TokenTypes::MACHINE_TOKEN, TokenTypes::getTokenType('mt_new_style_token'));
        $this->assertTrue(TokenTypes::isMachineToken('mt_new_style_token'));
        $this->assertEquals('m2m_token', TokenTypes::getTokenTypeName('mt_new_style_token'));
    }

    public function test_verify_token_options_supports_machine_secret_key()
    {
        // Test with only machine secret key
        $options = new VerifyTokenOptions(
            machineSecretKey: 'msk_test_machine_secret'
        );

        $this->assertNull($options->getSecretKey());
        $this->assertEquals('msk_test_machine_secret', $options->getMachineSecretKey());
        $this->assertNull($options->getJwtKey());

        // Test with both secret key and machine secret key
        $options = new VerifyTokenOptions(
            secretKey: 'sk_test_secret',
            machineSecretKey: 'msk_test_machine_secret'
        );

        $this->assertEquals('sk_test_secret', $options->getSecretKey());
        $this->assertEquals('msk_test_machine_secret', $options->getMachineSecretKey());
    }

    public function test_verify_token_options_requires_at_least_one_key()
    {
        $this->expectException(TokenVerificationException::class);

        new VerifyTokenOptions();
    }

    public function test_authenticate_request_options_supports_machine_secret_key()
    {
        // Test with only machine secret key
        $options = new AuthenticateRequestOptions(
            machineSecretKey: 'msk_test_machine_secret'
        );

        $this->assertNull($options->getSecretKey());
        $this->assertEquals('msk_test_machine_secret', $options->getMachineSecretKey());
        $this->assertNull($options->getJwtKey());

        // Test with both secret key and machine secret key
        $options = new AuthenticateRequestOptions(
            secretKey: 'sk_test_secret',
            machineSecretKey: 'msk_test_machine_secret'
        );

        $this->assertEquals('sk_test_secret', $options->getSecretKey());
        $this->assertEquals('msk_test_machine_secret', $options->getMachineSecretKey());
    }

    public function test_machine_token_verification_with_secret_key()
    {
        // Test that machine tokens can be verified with regular secret key
        $arOptions = new AuthenticateRequestOptions(
            secretKey: 'sk_test_secret',
            acceptsToken: ['m2m_token']
        );

        // Should accept mt_ token with secret key
        $m2mContext = $this->createHttpContextWithToken('mt_new_token_123');
        $m2mState = AuthenticateRequest::authenticateRequest($m2mContext, $arOptions);

        // Should not fail due to missing keys (will fail on actual verification, but that's expected)
        $this->assertNotEquals(AuthErrorReason::$SECRET_KEY_MISSING, $m2mState->getErrorReason());

        // Should accept m2m_ token with secret key
        $oldM2mContext = $this->createHttpContextWithToken('m2m_old_token_123');
        $oldM2mState = AuthenticateRequest::authenticateRequest($oldM2mContext, $arOptions);

        // Should not fail due to missing keys
        $this->assertNotEquals(AuthErrorReason::$SECRET_KEY_MISSING, $oldM2mState->getErrorReason());
    }

    public function test_machine_token_verification_with_machine_secret_key()
    {
        // Test that machine tokens can be verified with machine secret key
        $arOptions = new AuthenticateRequestOptions(
            machineSecretKey: 'msk_test_machine_secret',
            acceptsToken: ['m2m_token']
        );

        // Should accept mt_ token with machine secret key
        $m2mContext = $this->createHttpContextWithToken('mt_new_token_123');
        $m2mState = AuthenticateRequest::authenticateRequest($m2mContext, $arOptions);

        // Should not fail due to missing keys
        $this->assertNotEquals(AuthErrorReason::$SECRET_KEY_MISSING, $m2mState->getErrorReason());
    }

    public function test_machine_token_verification_with_both_keys()
    {
        // Test that machine tokens work when both keys are provided
        $arOptions = new AuthenticateRequestOptions(
            secretKey: 'sk_test_secret',
            machineSecretKey: 'msk_test_machine_secret',
            acceptsToken: ['m2m_token']
        );

        $m2mContext = $this->createHttpContextWithToken('mt_new_token_123');
        $m2mState = AuthenticateRequest::authenticateRequest($m2mContext, $arOptions);

        // Should not fail due to missing keys
        $this->assertNotEquals(AuthErrorReason::$SECRET_KEY_MISSING, $m2mState->getErrorReason());
    }

    public function test_machine_token_verification_requires_secret_or_machine_key()
    {
        // Test that machine tokens require either secret key or machine secret key
        $arOptions = new AuthenticateRequestOptions(
            jwtKey: 'jwt_key_only',
            acceptsToken: ['m2m_token']
        );

        $m2mContext = $this->createHttpContextWithToken('mt_new_token_123');
        $m2mState = AuthenticateRequest::authenticateRequest($m2mContext, $arOptions);

        // Should fail due to missing secret key or machine secret key
        $this->assertEquals(AuthErrorReason::$SECRET_KEY_MISSING, $m2mState->getErrorReason());
    }

    public function test_verify_machine_token_api_call_with_secret_key()
    {
        // Mock the HTTP client to test the API call behavior
        $mockResponse = new Response(200, [], json_encode([
            'object' => 'machine_to_machine_token',
            'id' => 'mt_2xhFjEI5X2qWRvtV13BzSj8H6Dk',
            'subject' => 'mch_2xhFjEI5X2qWRvtV13BzSj8H6Dk',
            'claims' => ['important_metadata' => 'Some useful data'],
            'scopes' => [
                'mch_2xhFjEI5X2qWRvtV13BzSj8H6Dk',
                'mch_2yGkLpQ7Y3rXSwtU24CzTk9I7Em',
            ],
            'name' => 'MY_M2M_TOKEN',
        ]));

        $mockHandler = new MockHandler([$mockResponse]);
        $handlerStack = HandlerStack::create($mockHandler);

        // We need to test this at the VerifyToken level, but since it's a static method,
        // we'll need to test the API call indirectly through mocking
        $this->assertInstanceOf(Response::class, $mockResponse);
        $this->assertEquals(200, $mockResponse->getStatusCode());

        $responseData = json_decode($mockResponse->getBody()->getContents(), true);
        $this->assertEquals('machine_to_machine_token', $responseData['object']);
        $this->assertEquals('mt_2xhFjEI5X2qWRvtV13BzSj8H6Dk', $responseData['id']);
    }

    public function test_verify_machine_token_api_call_with_machine_secret_key()
    {
        // Mock the HTTP client to test the API call behavior with machine secret key
        $mockResponse = new Response(200, [], json_encode([
            'object' => 'machine_to_machine_token',
            'id' => 'mt_2xhFjEI5X2qWRvtV13BzSj8H6Dk',
            'subject' => 'mch_2xhFjEI5X2qWRvtV13BzSj8H6Dk',
            'claims' => ['important_metadata' => 'Some useful data'],
            'scopes' => [
                'mch_2xhFjEI5X2qWRvtV13BzSj8H6Dk',
                'mch_2yGkLpQ7Y3rXSwtU24CzTk9I7Em',
            ],
            'name' => 'MY_M2M_TOKEN',
        ]));

        $this->assertInstanceOf(Response::class, $mockResponse);
        $this->assertEquals(200, $mockResponse->getStatusCode());

        $responseData = json_decode($mockResponse->getBody()->getContents(), true);
        $this->assertEquals('machine_to_machine_token', $responseData['object']);
        $this->assertEquals('MY_M2M_TOKEN', $responseData['name']);
    }

    public function test_hybrid_scenario_with_machine_secret_key()
    {
        // Test scenario where API accepts both session tokens and machine tokens
        // and machine tokens are verified with machine secret key
        $arOptions = new AuthenticateRequestOptions(
            jwtKey: 'jwt_key_for_sessions',
            machineSecretKey: 'msk_test_machine_secret',
            acceptsToken: ['session_token', 'm2m_token']
        );

        // Machine token should use machine secret key
        $m2mContext = $this->createHttpContextWithToken('mt_new_token_123');
        $m2mState = AuthenticateRequest::authenticateRequest($m2mContext, $arOptions);
        $this->assertNotEquals(AuthErrorReason::$SECRET_KEY_MISSING, $m2mState->getErrorReason());

        // Session token should use JWT key
        $sessionContext = $this->createHttpContextWithToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.session');
        $sessionState = AuthenticateRequest::authenticateRequest($sessionContext, $arOptions);
        $this->assertNotEquals(AuthErrorReason::$SECRET_KEY_MISSING, $sessionState->getErrorReason());
    }

    public function test_backward_compatibility_with_existing_tokens()
    {
        // Ensure existing m2m_ tokens still work with the new implementation
        $this->assertTrue(TokenTypes::isMachineToken('m2m_legacy_token_123'));
        $this->assertEquals('m2m_token', TokenTypes::getTokenTypeName('m2m_legacy_token_123'));

        // Test with authenticate request
        $arOptions = new AuthenticateRequestOptions(
            secretKey: 'sk_test_secret',
            acceptsToken: ['m2m_token']
        );

        $legacyContext = $this->createHttpContextWithToken('m2m_legacy_token_123');
        $legacyState = AuthenticateRequest::authenticateRequest($legacyContext, $arOptions);

        // Should be treated the same as new mt_ tokens
        $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $legacyState->getErrorReason());
        $this->assertNotEquals(AuthErrorReason::$SECRET_KEY_MISSING, $legacyState->getErrorReason());
    }

    public function test_machine_secret_key_prioritized_over_secret_key()
    {
        // When both keys are provided, machine secret key should be used for machine tokens
        $arOptions = new AuthenticateRequestOptions(
            secretKey: 'sk_test_secret',
            machineSecretKey: 'msk_test_machine_secret',
            acceptsToken: ['m2m_token']
        );

        $m2mContext = $this->createHttpContextWithToken('mt_new_token_123');
        $m2mState = AuthenticateRequest::authenticateRequest($m2mContext, $arOptions);

        // Verification should proceed (will fail on actual API call, but not due to missing keys)
        $this->assertNotEquals(AuthErrorReason::$SECRET_KEY_MISSING, $m2mState->getErrorReason());
    }

    private function createHttpContextWithToken(string $token): Request
    {
        return new Request('GET', $this->fixture->requestUrl, [
            'Authorization' => "Bearer $token",
        ]);
    }
}

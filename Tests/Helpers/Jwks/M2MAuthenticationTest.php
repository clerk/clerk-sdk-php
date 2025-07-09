<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Helpers\Jwks;

use Clerk\Backend\Helpers\Jwks\AuthenticateRequest;
use Clerk\Backend\Helpers\Jwks\AuthenticateRequestOptions;
use Clerk\Backend\Helpers\Jwks\AuthErrorReason;
use Clerk\Backend\Helpers\Jwks\TokenTypes;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

final class M2MAuthenticationTest extends TestCase
{
    private JwksHelpersFixture $fixture;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fixture = new JwksHelpersFixture();
    }

    public function test_accepts_all_token_types_by_default()
    {
        // Default behavior should accept any token type
        $arOptions = new AuthenticateRequestOptions(
            secretKey: 'sk_test_secret'
        );

        // Test machine token
        $m2mContext = $this->createHttpContextWithToken('mt_service_token_123');
        $m2mState = AuthenticateRequest::authenticateRequest($m2mContext, $arOptions);

        // Should not be rejected due to token type
        $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $m2mState->getErrorReason());

        // Test session token
        $sessionContext = $this->createHttpContextWithToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.session');
        $sessionState = AuthenticateRequest::authenticateRequest($sessionContext, $arOptions);

        // Should not be rejected due to token type
        $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $sessionState->getErrorReason());
    }

    public function test_microservice_to_microservice_scenario()
    {
        // Scenario: Microservice that only accepts M2M tokens
        $arOptions = new AuthenticateRequestOptions(
            secretKey: 'sk_test_secret',
            acceptsToken: ['machine_token']
        );

        // Should accept M2M token
        $m2mContext = $this->createHttpContextWithToken('mt_service_token_123');
        $m2mState = AuthenticateRequest::authenticateRequest($m2mContext, $arOptions);
        $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $m2mState->getErrorReason());

        // Should reject session token
        $sessionContext = $this->createHttpContextWithToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.session');
        $sessionState = AuthenticateRequest::authenticateRequest($sessionContext, $arOptions);
        $this->assertEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $sessionState->getErrorReason());
    }

    public function test_oauth_resource_server_scenario()
    {
        // Scenario: OAuth resource server that accepts OAuth and API key tokens
        $arOptions = new AuthenticateRequestOptions(
            secretKey: 'sk_test_secret',
            acceptsToken: ['oauth_token', 'api_key']
        );

        // Should accept OAuth token
        $oauthContext = $this->createHttpContextWithToken('oat_oauth_access_token_123');
        $oauthState = AuthenticateRequest::authenticateRequest($oauthContext, $arOptions);
        $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $oauthState->getErrorReason());

        // Should accept API key
        $apiKeyContext = $this->createHttpContextWithToken('ak_api_key_123');
        $apiKeyState = AuthenticateRequest::authenticateRequest($apiKeyContext, $arOptions);
        $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $apiKeyState->getErrorReason());

        // Should reject M2M token
        $m2mContext = $this->createHttpContextWithToken('mt_machine_token_123');
        $m2mState = AuthenticateRequest::authenticateRequest($m2mContext, $arOptions);
        $this->assertEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $m2mState->getErrorReason());
    }

    public function test_hybrid_api_scenario()
    {
        // Scenario: API that accepts both session tokens and M2M tokens
        $arOptions = new AuthenticateRequestOptions(
            secretKey: 'sk_test_secret',
            acceptsToken: ['session_token', 'machine_token']
        );

        // Should accept M2M token
        $m2mContext = $this->createHttpContextWithToken('mt_service_token_123');
        $m2mState = AuthenticateRequest::authenticateRequest($m2mContext, $arOptions);
        $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $m2mState->getErrorReason());

        // Should accept session token
        $sessionContext = $this->createHttpContextWithToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.session');
        $sessionState = AuthenticateRequest::authenticateRequest($sessionContext, $arOptions);
        $this->assertNotEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $sessionState->getErrorReason());

        // Should reject OAuth token
        $oauthContext = $this->createHttpContextWithToken('oat_oauth_token_123');
        $oauthState = AuthenticateRequest::authenticateRequest($oauthContext, $arOptions);
        $this->assertEquals(AuthErrorReason::$TOKEN_TYPE_NOT_SUPPORTED, $oauthState->getErrorReason());
    }

    public function test_machine_token_requires_secret_key()
    {
        // Machine tokens should require secret key for verification
        $arOptions = new AuthenticateRequestOptions(
            jwtKey: 'jwt_key_only',
            acceptsToken: ['machine_token']
        );

        $m2mContext = $this->createHttpContextWithToken('mt_service_token_123');
        $m2mState = AuthenticateRequest::authenticateRequest($m2mContext, $arOptions);

        // Should fail due to missing secret key
        $this->assertEquals(AuthErrorReason::$SECRET_KEY_MISSING, $m2mState->getErrorReason());
    }

    public function test_token_type_detection()
    {
        $this->assertEquals(TokenTypes::MACHINE_TOKEN, TokenTypes::getTokenType('mt_token_123'));
        $this->assertEquals(TokenTypes::OAUTH_TOKEN, TokenTypes::getTokenType('oat_token_123'));
        $this->assertEquals(TokenTypes::API_KEY, TokenTypes::getTokenType('ak_key_123'));
        $this->assertEquals(TokenTypes::SESSION_TOKEN, TokenTypes::getTokenType('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.session'));
        $this->assertEquals(TokenTypes::UNKNOWN, TokenTypes::getTokenType('invalid_token'));
        $this->assertEquals(TokenTypes::UNKNOWN, TokenTypes::getTokenType(''));
    }

    public function test_token_type_validation_methods()
    {
        $this->assertTrue(TokenTypes::isMachineToken('mt_token_123'));
        $this->assertFalse(TokenTypes::isMachineToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.session'));

        $this->assertTrue(TokenTypes::isOAuthToken('oat_token_123'));
        $this->assertFalse(TokenTypes::isOAuthToken('mt_token_123'));

        $this->assertTrue(TokenTypes::isApiKey('ak_key_123'));
        $this->assertFalse(TokenTypes::isApiKey('oat_token_123'));

        $this->assertTrue(TokenTypes::isSessionToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.session'));
        $this->assertFalse(TokenTypes::isSessionToken('mt_token_123'));
    }

    public function test_token_type_name_generation()
    {
        $this->assertEquals('machine_token', TokenTypes::getTokenTypeName('mt_token_123'));
        $this->assertEquals('oauth_token', TokenTypes::getTokenTypeName('oat_token_123'));
        $this->assertEquals('api_key', TokenTypes::getTokenTypeName('ak_key_123'));
        $this->assertEquals('session_token', TokenTypes::getTokenTypeName('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.session'));
        $this->assertEquals('unknown', TokenTypes::getTokenTypeName('invalid_token'));
    }

    private function createHttpContextWithToken(string $token): Request
    {
        return new Request('GET', $this->fixture->requestUrl, [
            'Authorization' => "Bearer $token",
        ]);
    }
}
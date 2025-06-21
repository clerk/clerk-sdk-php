<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Helpers\Jwks;
 
use Clerk\Backend\Helpers\Jwks\AuthErrorReason;
use Clerk\Backend\Helpers\Jwks\RequestState;
use Clerk\Backend\Helpers\Jwks\SessionAuthObjectV1;
use Clerk\Backend\Helpers\Jwks\SessionAuthObjectV2;
use Clerk\Backend\Helpers\Jwks\OAuthMachineAuthObject;
use Clerk\Backend\Helpers\Jwks\APIKeyMachineAuthObject;
use Clerk\Backend\Helpers\Jwks\M2MMachineAuthObject;
use Clerk\Backend\Helpers\Jwks\TokenTypes;
use PHPUnit\Framework\TestCase;

final class RequestStateTest extends TestCase
{
    public function test_isAuthenticated_returns_true_for_signed_in_state()
    {
        $payload = new \stdClass();
        $payload->sub = 'user_123';
        
        $state = RequestState::signedIn('token_123', $payload);
        
        $this->assertTrue($state->isAuthenticated());
    }

    public function test_isAuthenticated_returns_false_for_signed_out_state()
    {
        $state = RequestState::signedOut(AuthErrorReason::$SESSION_TOKEN_MISSING);
        
        $this->assertFalse($state->isAuthenticated());
    }

    public function test_isSignedIn_is_deprecated_but_still_works()
    {
        $payload = new \stdClass();
        $payload->sub = 'user_123';
        
        $state = RequestState::signedIn('token_123', $payload);
        
        // Should still work for backward compatibility
        $this->assertTrue($state->isSignedIn());
    }

    public function test_toAuth_returns_session_auth_object_v1_for_session_token()
    {
        $payload = (object)[
            'sid' => 'sess_123',
            'sub' => 'user_456',
            'org_id' => 'org_789',
            'org_role' => 'admin'
        ];
        
        $state = RequestState::signedIn('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.session', $payload);
        $auth = $state->toAuth();
        
        $this->assertInstanceOf(SessionAuthObjectV1::class, $auth);
        $this->assertEquals('sess_123', $auth->session_id);
        $this->assertEquals('user_456', $auth->user_id);
        $this->assertEquals('org_789', $auth->org_id);
        $this->assertEquals('admin', $auth->org_role);
    }

    public function test_toAuth_returns_session_auth_object_v2_for_session_token_with_version_2()
    {
        $payload = (object)[
            'exp' => 1234567890,
            'iat' => 1234567890,
            'iss' => 'https://api.clerk.com',
            'sid' => 'sess_123',
            'sub' => 'user_456',
            'v' => 2,
            'email' => 'user@example.com'
        ];
        
        $state = RequestState::signedIn('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.session', $payload);
        $auth = $state->toAuth();
        
        $this->assertInstanceOf(SessionAuthObjectV2::class, $auth);
        $this->assertEquals(1234567890, $auth->exp);
        $this->assertEquals(1234567890, $auth->iat);
        $this->assertEquals('https://api.clerk.com', $auth->iss);
        $this->assertEquals('sess_123', $auth->sid);
        $this->assertEquals('user_456', $auth->sub);
        $this->assertEquals(2, $auth->v);
        $this->assertEquals('user@example.com', $auth->email);
    }

    public function test_toAuth_returns_oauth_machine_auth_object_for_oauth_token()
    {
        $payload = (object)[
            'id' => 'oat_123',
            'subject' => 'user_456',
            'client_id' => 'client_789',
            'name' => 'My OAuth Token',
            'scopes' => ['read', 'write']
        ];
        
        $state = RequestState::signedIn('oat_oauth_token_123', $payload);
        $auth = $state->toAuth();
        
        $this->assertInstanceOf(OAuthMachineAuthObject::class, $auth);
        $this->assertEquals('oauth_token', $auth->token_type);
        $this->assertEquals('oat_123', $auth->id);
        $this->assertEquals('user_456', $auth->user_id);
        $this->assertEquals('client_789', $auth->client_id);
        $this->assertEquals('My OAuth Token', $auth->name);
        $this->assertEquals(['read', 'write'], $auth->scopes);
    }

    public function test_toAuth_returns_api_key_machine_auth_object_for_api_key()
    {
        $payload = (object)[
            'id' => 'ak_123',
            'subject' => 'user_456',
            'org_id' => 'org_789',
            'name' => 'My API Key',
            'scopes' => ['read', 'write'],
            'claims' => ['foo' => 'bar']
        ];
        
        $state = RequestState::signedIn('ak_api_key_123', $payload);
        $auth = $state->toAuth();
        
        $this->assertInstanceOf(APIKeyMachineAuthObject::class, $auth);
        $this->assertEquals('api_key', $auth->token_type);
        $this->assertEquals('ak_123', $auth->id);
        $this->assertEquals('user_456', $auth->user_id);
        $this->assertEquals('org_789', $auth->org_id);
        $this->assertEquals('My API Key', $auth->name);
        $this->assertEquals(['read', 'write'], $auth->scopes);
        $this->assertEquals(['foo' => 'bar'], $auth->claims);
    }

    public function test_toAuth_returns_m2m_machine_auth_object_for_machine_token()
    {
        $payload = (object)[
            'id' => 'm2m_123',
            'subject' => 'mch_456',
            'client_id' => 'client_789',
            'name' => 'My M2M Token',
            'scopes' => ['mch_456', 'mch_789'],
            'claims' => ['important_metadata' => 'Some useful data']
        ];
        
        $state = RequestState::signedIn('mt_machine_token_123', $payload);
        $auth = $state->toAuth();
        
        $this->assertInstanceOf(M2MMachineAuthObject::class, $auth);
        $this->assertEquals('machine_token', $auth->token_type);
        $this->assertEquals('m2m_123', $auth->id);
        $this->assertEquals('mch_456', $auth->machine_id);
        $this->assertEquals('client_789', $auth->client_id);
        $this->assertEquals('My M2M Token', $auth->name);
        $this->assertEquals(['mch_456', 'mch_789'], $auth->scopes);
        $this->assertEquals(['important_metadata' => 'Some useful data'], $auth->claims);
    }

    public function test_toAuth_throws_exception_for_unauthenticated_state()
    {
        $state = RequestState::signedOut(AuthErrorReason::$SESSION_TOKEN_MISSING);
        
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Cannot convert to AuthObject in unauthenticated state.');
        
        $state->toAuth();
    }

    public function test_toAuth_throws_exception_for_unsupported_token_type()
    {
        $payload = new \stdClass();
        $payload->sub = 'user_123';
        
        $state = RequestState::signedIn('unknown_token_type', $payload);
        
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Unsupported token type: unknown');
        
        $state->toAuth();
    }

    public function test_session_auth_object_v1_constructor()
    {
        $payload = [
            'sid' => 'sess_123',
            'sub' => 'user_456',
            'org_id' => 'org_789',
            'org_role' => 'admin',
            'org_permissions' => ['read', 'write'],
            'fva' => [3600, 7200],
            'custom_field' => 'custom_value'
        ];

        $authObject = new SessionAuthObjectV1($payload);

        $this->assertEquals('sess_123', $authObject->session_id);
        $this->assertEquals('user_456', $authObject->user_id);
        $this->assertEquals('org_789', $authObject->org_id);
        $this->assertEquals('admin', $authObject->org_role);
        $this->assertEquals(['read', 'write'], $authObject->org_permissions);
        $this->assertEquals([3600, 7200], $authObject->factor_verification_age);
        $this->assertEquals($payload, $authObject->claims);
    }

    public function test_session_auth_object_v1_with_minimal_payload()
    {
        $payload = [
            'sid' => 'sess_123',
            'sub' => 'user_456'
        ];

        $authObject = new SessionAuthObjectV1($payload);

        $this->assertEquals('sess_123', $authObject->session_id);
        $this->assertEquals('user_456', $authObject->user_id);
        $this->assertNull($authObject->org_id);
        $this->assertNull($authObject->org_role);
        $this->assertNull($authObject->org_permissions);
        $this->assertNull($authObject->factor_verification_age);
        $this->assertEquals($payload, $authObject->claims);
    }

    public function test_session_auth_object_v2_constructor()
    {
        $payload = [
            'exp' => 1234567890,
            'iat' => 1234567890,
            'iss' => 'https://api.clerk.com',
            'sid' => 'sess_123',
            'sub' => 'user_456',
            'v' => 2,
            'jti' => 'jwt_id_123',
            'role' => 'user',
            'fva' => [3600, 7200],
            'nbf' => 1234567890,
            'email' => 'user@example.com',
            'azp' => 'https://example.com'
        ];

        $authObject = new SessionAuthObjectV2($payload);

        $this->assertEquals(1234567890, $authObject->exp);
        $this->assertEquals(1234567890, $authObject->iat);
        $this->assertEquals('https://api.clerk.com', $authObject->iss);
        $this->assertEquals('sess_123', $authObject->sid);
        $this->assertEquals('user_456', $authObject->sub);
        $this->assertEquals(2, $authObject->v);
        $this->assertEquals('jwt_id_123', $authObject->jti);
        $this->assertEquals('user', $authObject->role);
        $this->assertEquals([3600, 7200], $authObject->fva);
        $this->assertEquals(1234567890, $authObject->nbf);
        $this->assertEquals('user@example.com', $authObject->email);
        $this->assertEquals('https://example.com', $authObject->azp);
    }

    public function test_session_auth_object_v2_with_minimal_payload()
    {
        $payload = [
            'exp' => 1234567890,
            'iat' => 1234567890,
            'iss' => 'https://api.clerk.com',
            'sid' => 'sess_123',
            'sub' => 'user_456',
            'v' => 2
        ];

        $authObject = new SessionAuthObjectV2($payload);

        $this->assertEquals(1234567890, $authObject->exp);
        $this->assertEquals(1234567890, $authObject->iat);
        $this->assertEquals('https://api.clerk.com', $authObject->iss);
        $this->assertEquals('sess_123', $authObject->sid);
        $this->assertEquals('user_456', $authObject->sub);
        $this->assertEquals(2, $authObject->v);
        $this->assertNull($authObject->jti);
        $this->assertNull($authObject->role);
        $this->assertNull($authObject->fva);
        $this->assertNull($authObject->nbf);
        $this->assertNull($authObject->email);
        $this->assertNull($authObject->azp);
    }

    public function test_oauth_machine_auth_object_constructor()
    {
        $payload = [
            'id' => 'oat_123',
            'subject' => 'user_456',
            'client_id' => 'client_789',
            'name' => 'My OAuth Token',
            'scopes' => ['read', 'write']
        ];

        $authObject = new OAuthMachineAuthObject($payload);

        $this->assertEquals('oauth_token', $authObject->token_type);
        $this->assertEquals('oat_123', $authObject->id);
        $this->assertEquals('user_456', $authObject->user_id);
        $this->assertEquals('client_789', $authObject->client_id);
        $this->assertEquals('My OAuth Token', $authObject->name);
        $this->assertEquals(['read', 'write'], $authObject->scopes);
    }

    public function test_oauth_machine_auth_object_with_minimal_payload()
    {
        $payload = [
            'id' => 'oat_123',
            'subject' => 'user_456'
        ];

        $authObject = new OAuthMachineAuthObject($payload);

        $this->assertEquals('oauth_token', $authObject->token_type);
        $this->assertEquals('oat_123', $authObject->id);
        $this->assertEquals('user_456', $authObject->user_id);
        $this->assertNull($authObject->client_id);
        $this->assertNull($authObject->name);
        $this->assertNull($authObject->scopes);
    }

    public function test_api_key_machine_auth_object_constructor()
    {
        $payload = [
            'id' => 'ak_123',
            'subject' => 'user_456',
            'org_id' => 'org_789',
            'name' => 'My API Key',
            'scopes' => ['read', 'write'],
            'claims' => ['foo' => 'bar']
        ];

        $authObject = new APIKeyMachineAuthObject($payload);

        $this->assertEquals('api_key', $authObject->token_type);
        $this->assertEquals('ak_123', $authObject->id);
        $this->assertEquals('user_456', $authObject->user_id);
        $this->assertEquals('org_789', $authObject->org_id);
        $this->assertEquals('My API Key', $authObject->name);
        $this->assertEquals(['read', 'write'], $authObject->scopes);
        $this->assertEquals(['foo' => 'bar'], $authObject->claims);
    }

    public function test_api_key_machine_auth_object_with_minimal_payload()
    {
        $payload = [
            'id' => 'ak_123',
            'subject' => 'user_456'
        ];

        $authObject = new APIKeyMachineAuthObject($payload);

        $this->assertEquals('api_key', $authObject->token_type);
        $this->assertEquals('ak_123', $authObject->id);
        $this->assertEquals('user_456', $authObject->user_id);
        $this->assertNull($authObject->org_id);
        $this->assertNull($authObject->name);
        $this->assertNull($authObject->scopes);
        $this->assertNull($authObject->claims);
    }

    public function test_m2m_machine_auth_object_constructor()
    {
        $payload = [
            'id' => 'm2m_123',
            'subject' => 'mch_456',
            'client_id' => 'client_789',
            'name' => 'My M2M Token',
            'scopes' => ['mch_456', 'mch_789'],
            'claims' => ['important_metadata' => 'Some useful data']
        ];

        $authObject = new M2MMachineAuthObject($payload);

        $this->assertEquals('machine_token', $authObject->token_type);
        $this->assertEquals('m2m_123', $authObject->id);
        $this->assertEquals('mch_456', $authObject->machine_id);
        $this->assertEquals('client_789', $authObject->client_id);
        $this->assertEquals('My M2M Token', $authObject->name);
        $this->assertEquals(['mch_456', 'mch_789'], $authObject->scopes);
        $this->assertEquals(['important_metadata' => 'Some useful data'], $authObject->claims);
    }

    public function test_m2m_machine_auth_object_with_minimal_payload()
    {
        $payload = [
            'id' => 'm2m_123',
            'subject' => 'mch_456'
        ];

        $authObject = new M2MMachineAuthObject($payload);

        $this->assertEquals('machine_token', $authObject->token_type);
        $this->assertEquals('m2m_123', $authObject->id);
        $this->assertEquals('mch_456', $authObject->machine_id);
        $this->assertNull($authObject->client_id);
        $this->assertNull($authObject->name);
        $this->assertNull($authObject->scopes);
        $this->assertNull($authObject->claims);
    }
} 
<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Helpers\Jwks;

use Clerk\Backend\Helpers\Jwks\AuthenticateRequest;
use Clerk\Backend\Helpers\Jwks\AuthenticateRequestException;
use Clerk\Backend\Helpers\Jwks\AuthenticateRequestOptions;
use Clerk\Backend\Helpers\Jwks\AuthErrorReason;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\TestCase;

final class AuthenticateRequestTest extends TestCase
{
    private JwksHelpersFixture $fixture;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fixture = new JwksHelpersFixture();
    }

    public function test_authenticate_request_no_session_token()
    {
        $arOptions = new AuthenticateRequestOptions('sk_test_SecretKey');

        $request = new Request('GET', $this->fixture->requestUrl);
        $state = AuthenticateRequest::authenticateRequest($request, $arOptions);

        $this->assertTrue($state->isSignedOut());
        $this->assertEquals(AuthErrorReason::$SESSION_TOKEN_MISSING, $state->getErrorReason());
        $this->assertNull($state->getToken());
        $this->assertNull($state->getPayload());
    }

    public function test_authenticate_request_no_secret_key()
    {
        $this->expectException(AuthenticateRequestException::class);
        $this->expectExceptionMessage('Missing Clerk Secret Key.');

        new AuthenticateRequestOptions();
    }
    /**
     * @requires CLERK_SECRET_KEY
     * @requires CLERK_SESSION_TOKEN
     */
    public function test_authenticate_request_cookie()
    {
        Utils::skipIfEnvVarsNotSet($this, ['CLERK_SECRET_KEY', 'CLERK_SESSION_TOKEN']);

        $arOptions = new AuthenticateRequestOptions(
            secretKey: $this->fixture->secretKey,
            audiences: $this->fixture->audiences,
            authorizedParties: [$this->fixture->authorizedParty],
        );

        $request = new Request('GET', $this->fixture->requestUrl, [
            'Cookie' => "__session={$this->fixture->sessionToken}",
        ]);

        $state = AuthenticateRequest::authenticateRequest($request, $arOptions);

        Utils::assertState($this, $state, $this->fixture->sessionToken);
    }

    /**
     * @requires CLERK_SECRET_KEY
     * @requires CLERK_SESSION_TOKEN
     */
    public function test_authenticate_request_bearer()
    {
        Utils::skipIfEnvVarsNotSet($this, ['CLERK_SECRET_KEY', 'CLERK_SESSION_TOKEN']);

        $arOptions = new AuthenticateRequestOptions(
            secretKey: $this->fixture->secretKey,
            audiences: $this->fixture->audiences,
            authorizedParties: [$this->fixture->authorizedParty]
        );

        $request = new Request('GET', $this->fixture->requestUrl, [
            'Authorization' => 'Bearer '.$this->fixture->sessionToken,
        ]);

        $state = AuthenticateRequest::authenticateRequest($request, $arOptions);

        Utils::assertState($this, $state, $this->fixture->sessionToken);
    }

    public function test_authenticate_request_local()
    {
        Utils::skipIfEnvVarsNotSet($this, ['CLERK_JWT_KEY', 'CLERK_SESSION_TOKEN']);

        $arOptions = new AuthenticateRequestOptions(
            jwtKey: $this->fixture->jwtKey,
            audiences: $this->fixture->audiences,
            authorizedParties: [$this->fixture->authorizedParty],
        );

        $request = new Request('GET', $this->fixture->requestUrl, [
            'Authorization' => 'Bearer '.$this->fixture->sessionToken,
        ]);

        $state = AuthenticateRequest::authenticateRequest($request, $arOptions);

        Utils::assertState($this, $state, $this->fixture->sessionToken);
    }
}

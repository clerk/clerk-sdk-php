<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Helpers\Jwks;

use Clerk\Backend\Helpers\Jwks\TokenVerificationErrorReason;
use Clerk\Backend\Helpers\Jwks\TokenVerificationException;
use Clerk\Backend\Helpers\Jwks\VerifyToken;
use Clerk\Backend\Helpers\Jwks\VerifyTokenOptions;

use PHPUnit\Framework\TestCase;

final class VerifyTokenTest extends TestCase
{
    private JwksHelpersFixture $fixture;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fixture = new JwksHelpersFixture();
    }

    public function test_verify_token_no_secret_key()
    {
        $this->expectException(TokenVerificationException::class);
        $this->expectExceptionMessage(TokenVerificationErrorReason::$SECRET_KEY_MISSING->getMessage());
        new VerifyTokenOptions();
    }

    public function test_verify_token_invalid_secret_key()
    {
        $this->expectException(TokenVerificationException::class);
        $this->expectExceptionMessage(TokenVerificationErrorReason::$JWK_FAILED_TO_LOAD->getMessage());

        $vtOptions = new VerifyTokenOptions(secretKey: 'sk_test_invalid');
        VerifyToken::verifyToken($this->fixture->testToken, $vtOptions);
    }

    public function test_verify_token_invalid_jwt_key()
    {
        $vtOptions = new VerifyTokenOptions(jwtKey: 'invalid.jwt.key');

        $this->expectException(TokenVerificationException::class);
        $this->expectExceptionMessage(TokenVerificationErrorReason::$JWK_LOCAL_INVALID->getMessage());
        VerifyToken::verifyToken($this->fixture->testToken, $vtOptions);
    }

    public function test_verify_token_invalid_signature()
    {
        $vtOptions = new VerifyTokenOptions(
            jwtKey: str_replace('+', '0', $this->fixture->testJwtKey)  // tampering with the key
        );

        $this->expectException(TokenVerificationException::class);
        $this->expectExceptionMessage(TokenVerificationErrorReason::$TOKEN_INVALID_SIGNATURE->getMessage());
        VerifyToken::verifyToken($this->fixture->testToken, $vtOptions);
    }

    public function test_verify_token_not_active_yet()
    {
        [$token, $jwtKey] = Utils::generateTokenKeyPair(
            notBefore: new \DateTimeImmutable('+10 seconds')
        );

        $vtOptions = new VerifyTokenOptions(jwtKey: $jwtKey);

        $this->expectException(TokenVerificationException::class);
        $this->expectExceptionMessage(TokenVerificationErrorReason::$TOKEN_NOT_ACTIVE_YET->getMessage());
        VerifyToken::verifyToken($token, $vtOptions);
    }

    public function test_verify_token_clock_skew()
    {
        $nbfDateTime = new \DateTimeImmutable('+10 seconds');
        $nbfTimeStamp = $nbfDateTime->getTimestamp();

        [$token, $jwtKey] = Utils::generateTokenKeyPair(
            issuedAt: new \DateTimeImmutable('-1 minute'),
            notBefore: $nbfDateTime,
            expires: new \DateTimeImmutable('+2 minutes')
        );

        $vtOptions = new VerifyTokenOptions(jwtKey: $jwtKey, clockSkewInMs: 0);

        $this->expectException(TokenVerificationException::class);
        $this->expectExceptionMessage(TokenVerificationErrorReason::$TOKEN_NOT_ACTIVE_YET->getMessage());

        VerifyToken::verifyToken($token, $vtOptions);

        $vtOptions = new VerifyTokenOptions(jwtKey: $jwtKey, clockSkewInMs: 10000);
        $payload = VerifyToken::verifyToken($token, $vtOptions);
        $this->assertTrue(isset($payload->nbf));
        $this->assertEquals($nbfTimeStamp, $payload->nbf);
    }

    public function test_verify_token_expired()
    {
        [$token, $jwtKey] = Utils::generateTokenKeyPair(
            issuedAt: new \DateTimeImmutable('-3 minutes'),
            notBefore: new \DateTimeImmutable('-2 minutes'),
            expires: new \DateTimeImmutable('-1 minute')
        );

        $vtOptions = new VerifyTokenOptions(jwtKey: $jwtKey);

        $this->expectException(TokenVerificationException::class);
        $this->expectExceptionMessage(TokenVerificationErrorReason::$TOKEN_EXPIRED->getMessage());
        VerifyToken::verifyToken($token, $vtOptions);
    }

    public function test_verify_token_issued_in_the_future()
    {
        // WARNING: The iat claim is only checked if the nbf claim is not present
        // https://github.com/firebase/php-jwt/blob/main/src/JWT.php#L166

        $iatClaim = new \DateTimeImmutable('+1 minute');
        $expClaim = new \DateTimeImmutable('+2 minutes');

        [$token, $jwtKey] = Utils::generateTokenKeyPair(
            issuedAt: $iatClaim,
            expires: $expClaim
        );

        $this->expectException(TokenVerificationException::class);
        $this->expectExceptionMessage(TokenVerificationErrorReason::$TOKEN_IAT_IN_THE_FUTURE->getMessage());
        VerifyToken::verifyToken($token, new VerifyTokenOptions(jwtKey: $jwtKey));
    }

    public function test_verify_token_invalid_audience()
    {
        $vtOptions = new VerifyTokenOptions(
            jwtKey: $this->fixture->testJwtKey,
            audiences: [$this->fixture->requestUrl]
        );

        $payload = VerifyToken::verifyToken($this->fixture->testToken, $vtOptions);

        $this->assertTrue(isset($payload->aud));
        $this->assertEquals($this->fixture->requestUrl, $payload->aud);

        $vtOptions = new VerifyTokenOptions(
            jwtKey: $this->fixture->testJwtKey,
            audiences: ['invalid.audience']
        );

        $this->expectException(TokenVerificationException::class);
        $this->expectExceptionMessage(TokenVerificationErrorReason::$TOKEN_INVALID_AUDIENCE->getMessage());
        VerifyToken::verifyToken($this->fixture->testToken, $vtOptions);
    }

    public function test_verify_token_invalid_authorized_parties()
    {
        $vtOptions = new VerifyTokenOptions(
            jwtKey: $this->fixture->testJwtKey,
            authorizedParties: ['http://some.authorized.party', $this->fixture->authorizedParty],
        );
        $payload = VerifyToken::verifyToken($this->fixture->testToken, $vtOptions);
        $this->assertTrue(isset($payload->azp));
        $this->assertContains($payload->azp, $vtOptions->getAuthorizedParties());


        $vtOptions = new VerifyTokenOptions(
            jwtKey: $this->fixture->testJwtKey,
            authorizedParties: ['http://only.authorized.party']
        );
        $this->expectException(TokenVerificationException::class);
        $this->expectExceptionMessage(TokenVerificationErrorReason::$TOKEN_INVALID_AUTHORIZED_PARTIES->getMessage());
        VerifyToken::verifyToken($this->fixture->testToken, $vtOptions);
    }

    /**
     * @requires CLERK_SECRET_KEY
     */
    public function test_verify_token_invalid_token()
    {
        Utils::skipIfEnvVarsNotSet($this, ['CLERK_SECRET_KEY']);

        $vtOptions = new VerifyTokenOptions(secretKey: $this->fixture->secretKey);

        $this->expectException(TokenVerificationException::class);
        $this->expectExceptionMessage(TokenVerificationErrorReason::$TOKEN_INVALID->getMessage());
        VerifyToken::verifyToken('invalid.session.token', $vtOptions);
    }

    /**
     * @requires CLERK_SECRET_KEY
     */
    public function test_verify_token_invalid_kid()
    {
        Utils::skipIfEnvVarsNotSet($this, ['CLERK_SECRET_KEY']);
        $token = Utils::generateTokenKeyPair()[0];

        $vtOptions = new VerifyTokenOptions(secretKey: $this->fixture->secretKey);

        $this->expectException(TokenVerificationException::class);
        $this->expectExceptionMessage(TokenVerificationErrorReason::$JWK_KID_MISMATCH->getMessage());

        VerifyToken::verifyToken($token, $vtOptions);
    }

    /**
     * @requires CLERK_SECRET_KEY
     * @requires CLERK_SESSION_TOKEN
     */
    public function test_verify_token_remote_ok()
    {
        Utils::skipIfEnvVarsNotSet($this, ['CLERK_SECRET_KEY', 'CLERK_SESSION_TOKEN']);

        $vtOptions = new VerifyTokenOptions(
            secretKey: $this->fixture->secretKey,
            audiences: $this->fixture->audiences,
            authorizedParties: [$this->fixture->authorizedParty],
            apiUrl: $this->fixture->apiUrl,
        );

        Utils::assertPayload($this, $this->fixture->sessionToken, $vtOptions);
    }

    /**
     * @requires CLERK_JWT_KEY
     * @requires CLERK_SESSION_TOKEN
     */
    public function test_verify_token_local_ok()
    {
        Utils::skipIfEnvVarsNotSet($this, ['CLERK_SECRET_KEY', 'CLERK_SESSION_TOKEN']);

        $vtOptions = new VerifyTokenOptions(
            jwtKey: $this->fixture->jwtKey,
            audiences: $this->fixture->audiences,
            authorizedParties: [$this->fixture->authorizedParty],
            apiUrl: $this->fixture->apiUrl,
        );

        Utils::assertPayload($this, $this->fixture->sessionToken, $vtOptions);
    }
}

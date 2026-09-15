<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Helpers\Jwks;

use Clerk\Backend\Helpers\Jwks\AuthenticateRequest;
use Clerk\Backend\Helpers\Jwks\AuthenticateRequestOptions;
use Clerk\Backend\Helpers\Jwks\TokenVerificationErrorReason;
use Clerk\Backend\Helpers\Jwks\TokenVerificationException;
use Clerk\Backend\Helpers\Jwks\VerifyToken;
use Clerk\Backend\Helpers\Jwks\VerifyTokenOptions;
use GuzzleHttp\Psr7\Request;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class AuthorizedPartiesTest extends TestCase
{
    public static function authorizedPartiesCases(): array
    {
        return [
            'omitted' => [[], true],
            'null' => [['authorizedParties' => null], true],
            'empty' => [['authorizedParties' => []], true],
            'matching' => [['authorizedParties' => ['https://other.example', 'https://app.example']], true],
            'mismatching' => [['authorizedParties' => ['https://other.example']], false],
        ];
    }

    #[DataProvider('authorizedPartiesCases')]
    public function test_verify_token_authorized_parties(array $options, bool $accepted): void
    {
        [$token, $jwtKey] = Utils::generateTokenKeyPair(authorizedParty: 'https://app.example');
        $options = new VerifyTokenOptions(...$options, jwtKey: $jwtKey);

        if (! $accepted) {
            $this->expectException(TokenVerificationException::class);
            $this->expectExceptionMessage(TokenVerificationErrorReason::$TOKEN_INVALID_AUTHORIZED_PARTIES->getMessage());
        }

        $payload = VerifyToken::verifyToken($token, $options);
        $this->assertSame('https://app.example', $payload->azp);
    }

    #[DataProvider('authorizedPartiesCases')]
    public function test_authenticate_request_authorized_parties(array $options, bool $accepted): void
    {
        [$token, $jwtKey] = Utils::generateTokenKeyPair(authorizedParty: 'https://app.example');
        $options = new AuthenticateRequestOptions(...$options, jwtKey: $jwtKey);
        $request = new Request('GET', 'https://api.example', ['Authorization' => 'Bearer '.$token]);

        $state = AuthenticateRequest::authenticateRequest($request, $options);

        $this->assertSame($accepted, $state->isSignedIn());
        if ($accepted) {
            $this->assertNull($state->getErrorReason());
            $this->assertSame('https://app.example', $state->getPayload()->azp);
        } else {
            $this->assertSame(TokenVerificationErrorReason::$TOKEN_INVALID_AUTHORIZED_PARTIES, $state->getErrorReason());
        }
    }
}

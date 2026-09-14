<?php

declare(strict_types=1);

namespace Clerk\Backend\Tests\Helpers\Jwks;

use Clerk\Backend\Helpers\Jwks\TokenVerificationErrorReason;
use Clerk\Backend\Helpers\Jwks\TokenVerificationException;
use Clerk\Backend\Helpers\Jwks\VerifyToken;
use Clerk\Backend\Helpers\Jwks\VerifyTokenOptions;
use Firebase\JWT\JWT;
use PHPUnit\Framework\TestCase;

final class VerifyTokenCacheTest extends TestCase
{
    private string $directory;
    private string $apiUrl;
    private string $token;
    private string $publicKey;
    /** @var resource|null */
    private $server = null;

    protected function setUp(): void
    {
        parent::setUp();
        $this->directory = sys_get_temp_dir().'/clerk-jwks-'.bin2hex(random_bytes(8));
        mkdir($this->directory);
        copy(__DIR__.'/Fixtures/jwks.php', $this->directory.'/router.php');
        $kid = bin2hex(random_bytes(16));
        [$this->token, $this->publicKey] = Utils::generateTokenKeyPair(keyId: $kid);
        $details = openssl_pkey_get_details(openssl_pkey_get_public($this->publicKey));
        file_put_contents($this->directory.'/response.json', json_encode([
            'authorization' => 'Bearer sk_test_first',
            'path' => '/v1/jwks',
            'key' => [
                'kid' => $kid,
                'kty' => 'RSA',
                'use' => 'sig',
                'alg' => 'RS256',
                'n' => JWT::urlsafeB64Encode($details['rsa']['n']),
                'e' => JWT::urlsafeB64Encode($details['rsa']['e']),
            ],
        ], JSON_THROW_ON_ERROR));
        file_put_contents($this->directory.'/requests.log', '');

        $socket = stream_socket_server('tcp://127.0.0.1:0');
        $this->assertNotFalse($socket);
        $address = stream_socket_get_name($socket, false);
        fclose($socket);
        $this->apiUrl = 'http://'.$address;
        $this->server = proc_open([PHP_BINARY, '-S', $address, $this->directory.'/router.php'], [
            0 => ['file', '/dev/null', 'r'],
            1 => ['file', $this->directory.'/server.log', 'a'],
            2 => ['file', $this->directory.'/server.log', 'a'],
        ], $pipes);
        $this->assertIsResource($this->server);
        $deadline = microtime(true) + 5;
        do {
            $connection = @stream_socket_client('tcp://'.$address, $errno, $error, 0.1);
            if ($connection !== false) {
                fclose($connection);

                return;
            }
            usleep(10000);
        } while (microtime(true) < $deadline);
        $this->fail('JWKS test server did not start: '.file_get_contents($this->directory.'/server.log'));
    }

    protected function tearDown(): void
    {
        if (is_resource($this->server)) {
            proc_terminate($this->server);
            proc_close($this->server);
        }
        foreach (glob($this->directory.'/*') as $file) {
            unlink($file);
        }
        rmdir($this->directory);
        parent::tearDown();
    }

    public function test_verify_token_resolves_keys_for_each_remote_configuration()
    {
        $original = new VerifyTokenOptions(secretKey: 'sk_test_first', apiUrl: $this->apiUrl);
        $alternatives = [
            new VerifyTokenOptions(secretKey: 'sk_test_second', apiUrl: $this->apiUrl),
            new VerifyTokenOptions(secretKey: 'sk_test_first', apiUrl: $this->apiUrl.'/other'),
            new VerifyTokenOptions(secretKey: 'sk_test_first', apiUrl: $this->apiUrl, apiVersion: 'v2'),
        ];

        foreach ($alternatives as $options) {
            $this->assertKeyNotFound($options);
        }
        $this->assertEquals('Test', VerifyToken::verifyToken($this->token, $original)->name);
        foreach ($alternatives as $options) {
            $this->assertKeyNotFound($options);
        }
        $this->assertEquals('Test', VerifyToken::verifyToken($this->token, $original)->name);
        $this->assertCount(7, file($this->directory.'/requests.log'));
    }

    public function test_verify_token_uses_the_effective_credential_for_caching()
    {
        $fixture = json_decode(file_get_contents($this->directory.'/response.json'), true, flags: JSON_THROW_ON_ERROR);
        $fixture['authorization'] = 'Bearer msk_test_first';
        file_put_contents($this->directory.'/response.json', json_encode($fixture, JSON_THROW_ON_ERROR));
        $original = new VerifyTokenOptions(secretKey: 'sk_test_first', machineSecretKey: 'msk_test_first', apiUrl: $this->apiUrl);
        $changed = new VerifyTokenOptions(secretKey: 'sk_test_first', machineSecretKey: 'msk_test_second', apiUrl: $this->apiUrl);

        $this->assertKeyNotFound($changed);
        $this->assertEquals('Test', VerifyToken::verifyToken($this->token, $original)->name);
        $this->assertKeyNotFound($changed);
        $this->assertKeyNotFound(new VerifyTokenOptions(secretKey: 'sk_test_first', apiUrl: $this->apiUrl));
        $equivalent = new VerifyTokenOptions(secretKey: 'sk_test_second', machineSecretKey: 'msk_test_first', apiUrl: $this->apiUrl);
        $this->assertEquals('Test', VerifyToken::verifyToken($this->token, $equivalent)->name);
        $this->assertCount(4, file($this->directory.'/requests.log'));
    }

    public function test_verify_token_reuses_cached_remote_keys()
    {
        $options = new VerifyTokenOptions(secretKey: 'sk_test_first', apiUrl: $this->apiUrl);
        $this->assertEquals('Test', VerifyToken::verifyToken($this->token, $options)->name);
        $this->assertEquals('Test', VerifyToken::verifyToken($this->token, $options)->name);
        $this->assertCount(1, file($this->directory.'/requests.log'));
    }

    public function test_verify_token_resolves_matching_key_ids_per_configuration()
    {
        $original = new VerifyTokenOptions(secretKey: 'sk_test_first', apiUrl: $this->apiUrl);
        $changed = new VerifyTokenOptions(secretKey: 'sk_test_second', apiUrl: $this->apiUrl);
        $this->assertEquals('Test', VerifyToken::verifyToken($this->token, $original)->name);

        $fixture = json_decode(file_get_contents($this->directory.'/response.json'), true, flags: JSON_THROW_ON_ERROR);
        [$otherToken, $otherKey] = Utils::generateTokenKeyPair(keyId: $fixture['key']['kid']);
        $details = openssl_pkey_get_details(openssl_pkey_get_public($otherKey));
        $fixture['authorization'] = 'Bearer sk_test_second';
        $fixture['key']['n'] = JWT::urlsafeB64Encode($details['rsa']['n']);
        $fixture['key']['e'] = JWT::urlsafeB64Encode($details['rsa']['e']);
        file_put_contents($this->directory.'/response.json', json_encode($fixture, JSON_THROW_ON_ERROR));

        $this->assertEquals('Test', VerifyToken::verifyToken($otherToken, $changed)->name);
        $this->assertEquals('Test', VerifyToken::verifyToken($this->token, $original)->name);
        $this->assertCount(2, file($this->directory.'/requests.log'));
        $this->expectException(TokenVerificationException::class);
        $this->expectExceptionMessage(TokenVerificationErrorReason::$TOKEN_INVALID_SIGNATURE->getMessage());
        VerifyToken::verifyToken($this->token, $changed);
    }

    public function test_verify_token_skips_cache_reads_and_writes()
    {
        $cached = new VerifyTokenOptions(secretKey: 'sk_test_first', apiUrl: $this->apiUrl);
        $uncached = new VerifyTokenOptions(secretKey: 'sk_test_first', apiUrl: $this->apiUrl, skipJwksCache: true);
        $this->assertEquals('Test', VerifyToken::verifyToken($this->token, $uncached)->name);
        $this->assertEquals('Test', VerifyToken::verifyToken($this->token, $cached)->name);
        $this->assertEquals('Test', VerifyToken::verifyToken($this->token, $uncached)->name);
        $this->assertCount(3, file($this->directory.'/requests.log'));
    }

    public function test_verify_token_uses_local_key_with_a_warm_cache()
    {
        $options = new VerifyTokenOptions(secretKey: 'sk_test_first', apiUrl: $this->apiUrl);
        $this->assertEquals('Test', VerifyToken::verifyToken($this->token, $options)->name);
        [, $otherKey] = Utils::generateTokenKeyPair();
        $this->expectException(TokenVerificationException::class);
        $this->expectExceptionMessage(TokenVerificationErrorReason::$TOKEN_INVALID_SIGNATURE->getMessage());
        VerifyToken::verifyToken($this->token, new VerifyTokenOptions(jwtKey: $otherKey));
    }

    private function assertKeyNotFound(VerifyTokenOptions $options): void
    {
        try {
            VerifyToken::verifyToken($this->token, $options);
            $this->fail('Expected no matching key for the configured endpoint.');
        } catch (TokenVerificationException $ex) {
            $this->assertSame(TokenVerificationErrorReason::$JWK_KID_MISMATCH, $ex->getReason());
        }
    }
}

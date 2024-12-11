<?php

namespace Clerk\Backend\Helpers\Jwks;

/**
 * The request authentication status.
 */
class AuthStatus
{
    private static ?AuthStatus $signedIn = null;
    private static ?AuthStatus $signedOut = null;

    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function signedIn(): AuthStatus
    {
        if (self::$signedIn === null) {
            self::$signedIn = new AuthStatus('signed-in');
        }

        return self::$signedIn;
    }

    public static function signedOut(): AuthStatus
    {
        if (self::$signedOut === null) {
            self::$signedOut = new AuthStatus('signed-out');
        }

        return self::$signedOut;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

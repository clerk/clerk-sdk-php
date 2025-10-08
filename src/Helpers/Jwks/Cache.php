<?php

namespace Clerk\Backend\Helpers\Jwks;

/**
 * In-memory cache with expiration.
 */
class Cache
{
    private array $cache = [];
    private int $expirationTime = 300; // 5 minutes

    /**
     * Stores a value in the cache with an expiration time.
     *
     * @param  string|null  $key  The cache key.
     * @param  string  $value  The value to cache.
     */
    public function set(?string $key, string $value): void
    {
        if ($key === null) {
            return;
        }

        $this->cache[$key] = [
            'value' => $value,
            'expiration' => time() + $this->expirationTime,
        ];
    }

    /**
     * Retrieves a value from the cache if it exists and has not expired.
     *
     * @param  string|null  $key  The cache key.
     * @return string|null The cached value, or null if not found or expired.
     */
    public function get(?string $key): ?string
    {
        if ($key === null) {
            return null;
        }

        if (isset($this->cache[$key])) {
            $entry = $this->cache[$key];

            if (time() < $entry['expiration']) {
                return $entry['value'];
            }

            // Expired, remove from cache
            unset($this->cache[$key]);
        }

        return null;
    }
}

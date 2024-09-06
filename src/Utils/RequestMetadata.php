<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Utils;

class RequestMetadata
{
    private function __construct(
        public string $mediaType,
    ) {
    }

    public static function parse(string $metadata): ?RequestMetadata
    {
        if (! str_starts_with($metadata, 'request:')) {
            return null;
        }

        $metadata = removePrefix($metadata, 'request:');

        $mediaType = '';

        $options = explode(',', $metadata);

        foreach ($options as $opt) {
            $parts = explode('=', $opt);
            if (count($parts) < 1 || count($parts) > 2) { /** @phpstan-ignore-line */
                continue;
            }

            match ($parts[0]) {
                'mediaType' => $mediaType = $parts[1],
                default => throw new \RuntimeException('Invalid media type sent'),
            };
        }

        return new RequestMetadata(
            mediaType: $mediaType,
        );
    }
}

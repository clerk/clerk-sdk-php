<?php

declare(strict_types=1);

namespace Clerk\Backend\Hooks;

use Psr\Http\Message\RequestInterface;

class ClerkBeforeRequestHooks implements BeforeRequestHook
{
    public function beforeRequest(BeforeRequestContext $context, RequestInterface $request): RequestInterface
    {
        return $request->withHeader(
            'Clerk-API-Version',
            '2024-10-01'
        );
    }
}
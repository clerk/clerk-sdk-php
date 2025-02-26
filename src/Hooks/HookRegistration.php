<?php

declare(strict_types=1);

namespace Clerk\Backend\Hooks;

/*
 * This file is only ever generated once on the first generation and then is free to be modified.
 * Any hooks you wish to add should be registered in the initHooks function. Feel free to define
 * your hooks in this file or in separate files in the hooks package.
 *
 * Hooks are registered per SDK instance, and are valid for the lifetime of the SDK instance.
 */
class HookRegistration
{
    /**
     * @param  Hooks  $hooks
     */
    public static function initHooks(Hooks $hooks): void
    {
        $hooks->registerBeforeRequestHook(new ClerkBeforeRequestHooks());
        
        // $myHook = new MyHook();
        
        // $hooks->registerSDKInitHook($myHook);
        // $hooks->registerBeforeRequestHook($myHook);
        // $hooks->registerAfterSuccessHook($myHook);
        // $hooks->registerAfterErrorHook($myHook);
    }
}

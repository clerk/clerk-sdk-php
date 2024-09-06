<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class UpdateInstanceRequestBody
{
    /**
     * Toggles test mode for this instance, allowing the use of test email addresses and phone numbers.
     *
     * Defaults to true for development instances.
     *
     * @var ?bool $testMode
     */
    #[\JMS\Serializer\Annotation\SerializedName('test_mode')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $testMode = null;

    /**
     * Whether the instance should be using the HIBP service to check passwords for breaches
     *
     * @var ?bool $hibp
     */
    #[\JMS\Serializer\Annotation\SerializedName('hibp')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $hibp = null;

    /**
     * The "enhanced_email_deliverability" feature will send emails from "verifications@clerk.dev" instead of your domain.
     *
     * This can be helpful if you do not have a high domain reputation.
     *
     * @var ?bool $enhancedEmailDeliverability
     */
    #[\JMS\Serializer\Annotation\SerializedName('enhanced_email_deliverability')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $enhancedEmailDeliverability = null;

    /**
     *
     * @var ?string $supportEmail
     */
    #[\JMS\Serializer\Annotation\SerializedName('support_email')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $supportEmail = null;

    /**
     *
     * @var ?string $clerkJsVersion
     */
    #[\JMS\Serializer\Annotation\SerializedName('clerk_js_version')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $clerkJsVersion = null;

    /**
     *
     * @var ?string $developmentOrigin
     */
    #[\JMS\Serializer\Annotation\SerializedName('development_origin')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $developmentOrigin = null;

    /**
     * For browser-like stacks such as browser extensions, Electron, or Capacitor.js the instance allowed origins need to be updated with the request origin value.
     *
     * For Chrome extensions popup, background, or service worker pages the origin is chrome-extension://extension_uiid. For Electron apps the default origin is http://localhost:3000. For Capacitor, the origin is capacitor://localhost.
     *
     * @var ?array<string> $allowedOrigins
     */
    #[\JMS\Serializer\Annotation\SerializedName('allowed_origins')]
    #[\JMS\Serializer\Annotation\Type('array<string>|null')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?array $allowedOrigins = null;

    /**
     * Whether the instance should operate in cookieless development mode (i.e. without third-party cookies).
     *
     * Deprecated: Please use `url_based_session_syncing` instead.
     *
     * @var ?bool $cookielessDev
     * @deprecated  field: This will be removed in a future release, please migrate away from it as soon as possible.
     */
    #[\JMS\Serializer\Annotation\SerializedName('cookieless_dev')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $cookielessDev = null;

    /**
     * Whether the instance should use URL-based session syncing in development mode (i.e. without third-party cookies).
     *
     * @var ?bool $urlBasedSessionSyncing
     */
    #[\JMS\Serializer\Annotation\SerializedName('url_based_session_syncing')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $urlBasedSessionSyncing = null;

    /**
     * @param  ?bool  $testMode
     * @param  ?bool  $hibp
     * @param  ?bool  $enhancedEmailDeliverability
     * @param  ?string  $supportEmail
     * @param  ?string  $clerkJsVersion
     * @param  ?string  $developmentOrigin
     * @param  ?array<string>  $allowedOrigins
     * @param  ?bool  $cookielessDev
     * @param  ?bool  $urlBasedSessionSyncing
     */
    public function __construct(?bool $testMode = null, ?bool $hibp = null, ?bool $enhancedEmailDeliverability = null, ?string $supportEmail = null, ?string $clerkJsVersion = null, ?string $developmentOrigin = null, ?array $allowedOrigins = null, ?bool $cookielessDev = null, ?bool $urlBasedSessionSyncing = null)
    {
        $this->testMode = $testMode;
        $this->hibp = $hibp;
        $this->enhancedEmailDeliverability = $enhancedEmailDeliverability;
        $this->supportEmail = $supportEmail;
        $this->clerkJsVersion = $clerkJsVersion;
        $this->developmentOrigin = $developmentOrigin;
        $this->allowedOrigins = $allowedOrigins;
        $this->cookielessDev = $cookielessDev;
        $this->urlBasedSessionSyncing = $urlBasedSessionSyncing;
    }
}
<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class UpdateInstanceRequestBody
{
    /**
     * For browser-like stacks such as browser extensions, Electron, or Capacitor.js the instance allowed origins need to be updated with the request origin value.
     *
     * For Chrome extensions popup, background, or service worker pages the origin is chrome-extension://extension_uiid. For Electron apps the default origin is http://localhost:3000. For Capacitor, the origin is capacitor://localhost.
     *
     * @var ?array<string> $allowedOrigins
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('allowed_origins')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $allowedOrigins = null;

    /**
     * Toggles test mode for this instance, allowing the use of test email addresses and phone numbers.
     *
     * Defaults to true for development instances.
     *
     * @var ?bool $testMode
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('test_mode')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $testMode = null;

    /**
     * Whether the instance should be using the HIBP service to check passwords for breaches
     *
     * @var ?bool $hibp
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('hibp')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $hibp = null;

    /**
     * The "enhanced_email_deliverability" feature will send emails from "verifications@clerk.dev" instead of your domain.
     *
     * This can be helpful if you do not have a high domain reputation.
     *
     * @var ?bool $enhancedEmailDeliverability
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('enhanced_email_deliverability')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $enhancedEmailDeliverability = null;

    /**
     *
     * @var ?string $supportEmail
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('support_email')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $supportEmail = null;

    /**
     *
     * @var ?string $clerkJsVersion
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('clerk_js_version')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $clerkJsVersion = null;

    /**
     *
     * @var ?string $developmentOrigin
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('development_origin')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $developmentOrigin = null;

    /**
     * Whether the instance should operate in cookieless development mode (i.e. without third-party cookies).
     *
     * Deprecated: Please use `url_based_session_syncing` instead.
     *
     * @var ?bool $cookielessDev
     * @deprecated  field: This will be removed in a future release, please migrate away from it as soon as possible.
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('cookieless_dev')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $cookielessDev = null;

    /**
     * Whether the instance should use URL-based session syncing in development mode (i.e. without third-party cookies).
     *
     * @var ?bool $urlBasedSessionSyncing
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('url_based_session_syncing')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $urlBasedSessionSyncing = null;

    /**
     * @param  ?array<string>  $allowedOrigins
     * @param  ?bool  $testMode
     * @param  ?bool  $hibp
     * @param  ?bool  $enhancedEmailDeliverability
     * @param  ?string  $supportEmail
     * @param  ?string  $clerkJsVersion
     * @param  ?string  $developmentOrigin
     * @param  ?bool  $cookielessDev
     * @param  ?bool  $urlBasedSessionSyncing
     * @phpstan-pure
     */
    public function __construct(?array $allowedOrigins = null, ?bool $testMode = null, ?bool $hibp = null, ?bool $enhancedEmailDeliverability = null, ?string $supportEmail = null, ?string $clerkJsVersion = null, ?string $developmentOrigin = null, ?bool $cookielessDev = null, ?bool $urlBasedSessionSyncing = null)
    {
        $this->allowedOrigins = $allowedOrigins;
        $this->testMode = $testMode;
        $this->hibp = $hibp;
        $this->enhancedEmailDeliverability = $enhancedEmailDeliverability;
        $this->supportEmail = $supportEmail;
        $this->clerkJsVersion = $clerkJsVersion;
        $this->developmentOrigin = $developmentOrigin;
        $this->cookielessDev = $cookielessDev;
        $this->urlBasedSessionSyncing = $urlBasedSessionSyncing;
    }
}
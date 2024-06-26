<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class UpdateInstanceAuthConfigRequestBody
{
    /**
     * Whether sign up is restricted to email addresses, phone numbers and usernames that are on the allowlist.
     *
     * @var ?bool $restrictedToAllowlist
     */
    #[\JMS\Serializer\Annotation\SerializedName('restricted_to_allowlist')]
    #[\JMS\Serializer\Annotation\Type('bool')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $restrictedToAllowlist = null;

    /**
     * The local part of the email address from which authentication-related emails (e.g. OTP code, magic links) will be sent.
     *
     * Only alphanumeric values are allowed.
     * Note that this value should contain only the local part of the address (e.g. `foo` for `foo@example.com`).
     *
     * @var ?string $fromEmailAddress
     */
    #[\JMS\Serializer\Annotation\SerializedName('from_email_address')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $fromEmailAddress = null;

    /**
     * Enable the Progressive Sign Up algorithm. Refer to the [docs](https://clerk.com/docs/upgrade-guides/progressive-sign-up) for more info.
     *
     * @var ?bool $progressiveSignUp
     */
    #[\JMS\Serializer\Annotation\SerializedName('progressive_sign_up')]
    #[\JMS\Serializer\Annotation\Type('bool')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $progressiveSignUp = null;

    /**
     * The name of the JWT Template used to augment your session tokens. To disable this, pass an empty string.
     *
     * @var ?string $sessionTokenTemplate
     */
    #[\JMS\Serializer\Annotation\SerializedName('session_token_template')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $sessionTokenTemplate = null;

    /**
     * The "enhanced_email_deliverability" feature will send emails from "verifications@clerk.dev" instead of your domain.
     *
     * This can be helpful if you do not have a high domain reputation.
     *
     * @var ?bool $enhancedEmailDeliverability
     */
    #[\JMS\Serializer\Annotation\SerializedName('enhanced_email_deliverability')]
    #[\JMS\Serializer\Annotation\Type('bool')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $enhancedEmailDeliverability = null;

    /**
     * Toggles test mode for this instance, allowing the use of test email addresses and phone numbers.
     *
     * Defaults to true for development instances.
     *
     * @var ?bool $testMode
     */
    #[\JMS\Serializer\Annotation\SerializedName('test_mode')]
    #[\JMS\Serializer\Annotation\Type('bool')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $testMode = null;

    public function __construct()
    {
        $this->restrictedToAllowlist = null;
        $this->fromEmailAddress = null;
        $this->progressiveSignUp = null;
        $this->sessionTokenTemplate = null;
        $this->enhancedEmailDeliverability = null;
        $this->testMode = null;
    }
}
<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class UpdateInstanceRestrictionsRequestBody
{
    /**
     *
     * @var ?bool $allowlist
     */
    #[\JMS\Serializer\Annotation\SerializedName('allowlist')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $allowlist = null;

    /**
     *
     * @var ?bool $blocklist
     */
    #[\JMS\Serializer\Annotation\SerializedName('blocklist')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $blocklist = null;

    /**
     *
     * @var ?bool $blockEmailSubaddresses
     */
    #[\JMS\Serializer\Annotation\SerializedName('block_email_subaddresses')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $blockEmailSubaddresses = null;

    /**
     *
     * @var ?bool $blockDisposableEmailDomains
     */
    #[\JMS\Serializer\Annotation\SerializedName('block_disposable_email_domains')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $blockDisposableEmailDomains = null;

    /**
     *
     * @var ?bool $ignoreDotsForGmailAddresses
     */
    #[\JMS\Serializer\Annotation\SerializedName('ignore_dots_for_gmail_addresses')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $ignoreDotsForGmailAddresses = null;

    /**
     * @param  ?bool  $allowlist
     * @param  ?bool  $blocklist
     * @param  ?bool  $blockEmailSubaddresses
     * @param  ?bool  $blockDisposableEmailDomains
     * @param  ?bool  $ignoreDotsForGmailAddresses
     */
    public function __construct(?bool $allowlist = null, ?bool $blocklist = null, ?bool $blockEmailSubaddresses = null, ?bool $blockDisposableEmailDomains = null, ?bool $ignoreDotsForGmailAddresses = null)
    {
        $this->allowlist = $allowlist;
        $this->blocklist = $blocklist;
        $this->blockEmailSubaddresses = $blockEmailSubaddresses;
        $this->blockDisposableEmailDomains = $blockDisposableEmailDomains;
        $this->ignoreDotsForGmailAddresses = $ignoreDotsForGmailAddresses;
    }
}
<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class UpsertTemplateRequestBody
{
    /**
     * The user-friendly name of the template
     *
     * @var ?string $name
     */
    #[\JMS\Serializer\Annotation\SerializedName('name')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $name = null;

    /**
     * The email subject.
     *
     * Applicable only to email templates.
     *
     * @var ?string $subject
     */
    #[\JMS\Serializer\Annotation\SerializedName('subject')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $subject = null;

    /**
     * The editor markup used to generate the body of the template
     *
     * @var ?string $markup
     */
    #[\JMS\Serializer\Annotation\SerializedName('markup')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $markup = null;

    /**
     * The template body before variable interpolation
     *
     * @var ?string $body
     */
    #[\JMS\Serializer\Annotation\SerializedName('body')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $body = null;

    /**
     * Whether Clerk should deliver emails or SMS messages based on the current template
     *
     * @var ?bool $deliveredByClerk
     */
    #[\JMS\Serializer\Annotation\SerializedName('delivered_by_clerk')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?bool $deliveredByClerk = null;

    /**
     * The local part of the From email address that will be used for emails.
     *
     * For example, in the address 'hello@example.com', the local part is 'hello'.
     * Applicable only to email templates.
     *
     * @var ?string $fromEmailName
     */
    #[\JMS\Serializer\Annotation\SerializedName('from_email_name')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $fromEmailName = null;

    /**
     * The local part of the Reply To email address that will be used for emails.
     *
     * For example, in the address 'hello@example.com', the local part is 'hello'.
     * Applicable only to email templates.
     *
     * @var ?string $replyToEmailName
     */
    #[\JMS\Serializer\Annotation\SerializedName('reply_to_email_name')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $replyToEmailName = null;

    /**
     * @param  ?string  $name
     * @param  ?string  $subject
     * @param  ?string  $markup
     * @param  ?string  $body
     * @param  ?bool  $deliveredByClerk
     * @param  ?string  $fromEmailName
     * @param  ?string  $replyToEmailName
     */
    public function __construct(?string $name = null, ?string $subject = null, ?string $markup = null, ?string $body = null, ?bool $deliveredByClerk = null, ?string $fromEmailName = null, ?string $replyToEmailName = null)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->markup = $markup;
        $this->body = $body;
        $this->deliveredByClerk = $deliveredByClerk;
        $this->fromEmailName = $fromEmailName;
        $this->replyToEmailName = $replyToEmailName;
    }
}
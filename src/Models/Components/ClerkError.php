<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


class ClerkError
{
    /**
     *
     * @var string $message
     */
    #[\JMS\Serializer\Annotation\SerializedName('message')]
    public string $message;

    /**
     *
     * @var string $longMessage
     */
    #[\JMS\Serializer\Annotation\SerializedName('long_message')]
    public string $longMessage;

    /**
     *
     * @var string $code
     */
    #[\JMS\Serializer\Annotation\SerializedName('code')]
    public string $code;

    /**
     *
     * @var ?Meta $meta
     */
    #[\JMS\Serializer\Annotation\SerializedName('meta')]
    #[\JMS\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\Meta|null')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?Meta $meta = null;

    /**
     *
     * @var ?string $clerkTraceId
     */
    #[\JMS\Serializer\Annotation\SerializedName('clerk_trace_id')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $clerkTraceId = null;

    /**
     * @param  ?string  $message
     * @param  ?string  $longMessage
     * @param  ?string  $code
     * @param  ?Meta  $meta
     * @param  ?string  $clerkTraceId
     */
    public function __construct(?string $message = null, ?string $longMessage = null, ?string $code = null, ?Meta $meta = null, ?string $clerkTraceId = null)
    {
        $this->message = $message;
        $this->longMessage = $longMessage;
        $this->code = $code;
        $this->meta = $meta;
        $this->clerkTraceId = $clerkTraceId;
    }
}
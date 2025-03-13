<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


class SignUpVerifications
{
    /**
     *
     * @var ?SignUpVerification $emailAddress
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('email_address')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\SignUpVerification|null')]
    public ?SignUpVerification $emailAddress;

    /**
     *
     * @var ?SignUpVerification $phoneNumber
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('phone_number')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\SignUpVerification|null')]
    public ?SignUpVerification $phoneNumber;

    /**
     *
     * @var ?SignUpVerification $web3Wallet
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('web3_wallet')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\SignUpVerification|null')]
    public ?SignUpVerification $web3Wallet;

    /**
     *
     * @var ?ExternalAccount $externalAccount
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('external_account')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\ExternalAccount|null')]
    public ?ExternalAccount $externalAccount;

    /**
     * @param  ?SignUpVerification  $emailAddress
     * @param  ?SignUpVerification  $phoneNumber
     * @param  ?SignUpVerification  $web3Wallet
     * @param  ?ExternalAccount  $externalAccount
     * @phpstan-pure
     */
    public function __construct(?SignUpVerification $emailAddress = null, ?SignUpVerification $phoneNumber = null, ?SignUpVerification $web3Wallet = null, ?ExternalAccount $externalAccount = null)
    {
        $this->emailAddress = $emailAddress;
        $this->phoneNumber = $phoneNumber;
        $this->web3Wallet = $web3Wallet;
        $this->externalAccount = $externalAccount;
    }
}
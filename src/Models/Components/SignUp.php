<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Components;


/** SignUp - Success */
class SignUp
{
    /**
     *
     * @var SignUpObject $object
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('object')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\SignUpObject')]
    public SignUpObject $object;

    /**
     *
     * @var string $id
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('id')]
    public string $id;

    /**
     *
     * @var SignUpStatus $status
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('status')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\SignUpStatus')]
    public SignUpStatus $status;

    /**
     *
     * @var bool $passwordEnabled
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('password_enabled')]
    public bool $passwordEnabled;

    /**
     *
     * @var bool $customAction
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('custom_action')]
    public bool $customAction;

    /**
     *
     * @var int $abandonAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('abandon_at')]
    public int $abandonAt;

    /**
     * $requiredFields
     *
     * @var ?array<string> $requiredFields
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('required_fields')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $requiredFields = null;

    /**
     * $optionalFields
     *
     * @var ?array<string> $optionalFields
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('optional_fields')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $optionalFields = null;

    /**
     * $missingFields
     *
     * @var ?array<string> $missingFields
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('missing_fields')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $missingFields = null;

    /**
     * $unverifiedFields
     *
     * @var ?array<string> $unverifiedFields
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('unverified_fields')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $unverifiedFields = null;

    /**
     *
     * @var ?Verifications $verifications
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('verifications')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\Verifications|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?Verifications $verifications = null;

    /**
     * $unsafeMetadata
     *
     * @var ?array<string, mixed> $unsafeMetadata
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('unsafe_metadata')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string, mixed>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $unsafeMetadata = null;

    /**
     * $publicMetadata
     *
     * @var ?array<string, mixed> $publicMetadata
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('public_metadata')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string, mixed>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $publicMetadata = null;

    /**
     *
     * @var ?ExternalAccount $externalAccount
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('external_account')]
    #[\Speakeasy\Serializer\Annotation\Type('\Clerk\Backend\Models\Components\ExternalAccount|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?ExternalAccount $externalAccount = null;

    /**
     *
     * @var ?string $username
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('username')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $username = null;

    /**
     *
     * @var ?string $emailAddress
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('email_address')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $emailAddress = null;

    /**
     *
     * @var ?string $phoneNumber
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('phone_number')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $phoneNumber = null;

    /**
     *
     * @var ?string $web3Wallet
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('web3_wallet')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $web3Wallet = null;

    /**
     *
     * @var ?string $firstName
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('first_name')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $firstName = null;

    /**
     *
     * @var ?string $lastName
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('last_name')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $lastName = null;

    /**
     *
     * @var ?string $externalId
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('external_id')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $externalId = null;

    /**
     *
     * @var ?string $createdSessionId
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('created_session_id')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $createdSessionId = null;

    /**
     *
     * @var ?string $createdUserId
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('created_user_id')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $createdUserId = null;

    /**
     * Unix timestamp at which the user accepted the legal requirements.
     *
     *
     *
     * @var ?int $legalAcceptedAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('legal_accepted_at')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $legalAcceptedAt = null;

    /**
     * @param  SignUpObject  $object
     * @param  string  $id
     * @param  SignUpStatus  $status
     * @param  bool  $passwordEnabled
     * @param  bool  $customAction
     * @param  int  $abandonAt
     * @param  ?array<string>  $requiredFields
     * @param  ?array<string>  $optionalFields
     * @param  ?array<string>  $missingFields
     * @param  ?array<string>  $unverifiedFields
     * @param  ?Verifications  $verifications
     * @param  ?array<string, mixed>  $unsafeMetadata
     * @param  ?array<string, mixed>  $publicMetadata
     * @param  ?ExternalAccount  $externalAccount
     * @param  ?string  $username
     * @param  ?string  $emailAddress
     * @param  ?string  $phoneNumber
     * @param  ?string  $web3Wallet
     * @param  ?string  $firstName
     * @param  ?string  $lastName
     * @param  ?string  $externalId
     * @param  ?string  $createdSessionId
     * @param  ?string  $createdUserId
     * @param  ?int  $legalAcceptedAt
     * @phpstan-pure
     */
    public function __construct(SignUpObject $object, string $id, SignUpStatus $status, bool $passwordEnabled, bool $customAction, int $abandonAt, ?array $requiredFields = null, ?array $optionalFields = null, ?array $missingFields = null, ?array $unverifiedFields = null, ?Verifications $verifications = null, ?array $unsafeMetadata = null, ?array $publicMetadata = null, ?ExternalAccount $externalAccount = null, ?string $username = null, ?string $emailAddress = null, ?string $phoneNumber = null, ?string $web3Wallet = null, ?string $firstName = null, ?string $lastName = null, ?string $externalId = null, ?string $createdSessionId = null, ?string $createdUserId = null, ?int $legalAcceptedAt = null)
    {
        $this->object = $object;
        $this->id = $id;
        $this->status = $status;
        $this->passwordEnabled = $passwordEnabled;
        $this->customAction = $customAction;
        $this->abandonAt = $abandonAt;
        $this->requiredFields = $requiredFields;
        $this->optionalFields = $optionalFields;
        $this->missingFields = $missingFields;
        $this->unverifiedFields = $unverifiedFields;
        $this->verifications = $verifications;
        $this->unsafeMetadata = $unsafeMetadata;
        $this->publicMetadata = $publicMetadata;
        $this->externalAccount = $externalAccount;
        $this->username = $username;
        $this->emailAddress = $emailAddress;
        $this->phoneNumber = $phoneNumber;
        $this->web3Wallet = $web3Wallet;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->externalId = $externalId;
        $this->createdSessionId = $createdSessionId;
        $this->createdUserId = $createdUserId;
        $this->legalAcceptedAt = $legalAcceptedAt;
    }
}
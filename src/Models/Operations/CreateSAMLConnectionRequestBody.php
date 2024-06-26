<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend\Models\Operations;


class CreateSAMLConnectionRequestBody
{
    /**
     * The name to use as a label for this SAML Connection
     *
     * @var string $name
     */
    #[\JMS\Serializer\Annotation\SerializedName('name')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $name;

    /**
     * The domain of your organization. Sign in flows using an email with this domain, will use this SAML Connection.
     *
     * @var string $domain
     */
    #[\JMS\Serializer\Annotation\SerializedName('domain')]
    #[\JMS\Serializer\Annotation\Type('string')]
    public string $domain;

    /**
     * The IdP provider of the connection.
     *
     * @var \Clerk\Backend\Models\Operations\Provider $provider
     */
    #[\JMS\Serializer\Annotation\SerializedName('provider')]
    #[\JMS\Serializer\Annotation\Type('enum<Clerk\Backend\Models\Operations\Provider>')]
    public Provider $provider;

    /**
     * The Entity ID as provided by the IdP
     *
     * @var ?string $idpEntityId
     */
    #[\JMS\Serializer\Annotation\SerializedName('idp_entity_id')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $idpEntityId = null;

    /**
     * The Single-Sign On URL as provided by the IdP
     *
     * @var ?string $idpSsoUrl
     */
    #[\JMS\Serializer\Annotation\SerializedName('idp_sso_url')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $idpSsoUrl = null;

    /**
     * The X.509 certificate as provided by the IdP
     *
     * @var ?string $idpCertificate
     */
    #[\JMS\Serializer\Annotation\SerializedName('idp_certificate')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $idpCertificate = null;

    /**
     * The URL which serves the IdP metadata. If present, it takes priority over the corresponding individual properties
     *
     * @var ?string $idpMetadataUrl
     */
    #[\JMS\Serializer\Annotation\SerializedName('idp_metadata_url')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $idpMetadataUrl = null;

    /**
     * The XML content of the IdP metadata file. If present, it takes priority over the corresponding individual properties
     *
     * @var ?string $idpMetadata
     */
    #[\JMS\Serializer\Annotation\SerializedName('idp_metadata')]
    #[\JMS\Serializer\Annotation\Type('string')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?string $idpMetadata = null;

    /**
     * Define the attribute name mapping between Identity Provider and Clerk's user properties
     *
     * @var ?\Clerk\Backend\Models\Operations\AttributeMapping $attributeMapping
     */
    #[\JMS\Serializer\Annotation\SerializedName('attribute_mapping')]
    #[\JMS\Serializer\Annotation\Type('Clerk\Backend\Models\Operations\AttributeMapping')]
    #[\JMS\Serializer\Annotation\SkipWhenEmpty]
    public ?AttributeMapping $attributeMapping = null;

    public function __construct()
    {
        $this->name = '';
        $this->domain = '';
        $this->provider = \Clerk\Backend\Models\Operations\Provider::SamlCustom;
        $this->idpEntityId = null;
        $this->idpSsoUrl = null;
        $this->idpCertificate = null;
        $this->idpMetadataUrl = null;
        $this->idpMetadata = null;
        $this->attributeMapping = null;
    }
}
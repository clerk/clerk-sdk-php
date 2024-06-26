<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend;

/**
 * ClerkBackendBuilder is used to configure and build an instance of the SDK.
 */
class ClerkBackendBuilder
{
    public function __construct(
        private SDKConfiguration $sdkConfig = new SDKConfiguration(),
    ) {
    }

    /**
     * setClient allows setting a custom Guzzle client for the SDK to make requests with.
     *
     * @param  \GuzzleHttp\ClientInterface  $client
     * @return ClerkBackendBuilder
     */
    public function setClient(\GuzzleHttp\ClientInterface $client): ClerkBackendBuilder
    {
        $this->sdkConfig->defaultClient = $client;

        return $this;
    }

    /**
     * setSecurity is used to configure the security required for the SDK.
     *
     * @param  string  $bearerAuth
     * @return ClerkBackendBuilder
     */
    public function setSecurity(string $bearerAuth): ClerkBackendBuilder
    {
        $security = new Models\Components\Security();
        $security->bearerAuth = $bearerAuth;
        $this->sdkConfig->security = $security;

        return $this;
    }

    /**
     * setSecuritySource is usd to configure the security required for the SDK.
     * unlike setSecurity, setSecuritySource accepts a closure that will be called to retrieve the security information.
     *
     * @param  pure-Closure(): string  $securitySource
     * @return ClerkBackendBuilder
     */
    public function setSecuritySource(\Closure $securitySource): ClerkBackendBuilder
    {
        $this->sdkConfig->securitySource = $securitySource;

        return $this;
    }

    /**
     * setServerUrl is used to configure the server URL for the SDK, and optionally template any parameters in the URL.
     *
     * @param  string  $serverUrl
     * @param  array<string, string>  $params
     * @return ClerkBackendBuilder
     */
    public function setServerUrl(string $serverUrl, ?array $params = null): ClerkBackendBuilder
    {
        $this->sdkConfig->serverUrl = Utils\Utils::templateUrl($serverUrl, $params);

        return $this;
    }

    /**
     * setServer is used to configure the server for the SDK
     *
     * @param  int  $serverIdx
     * @return ClerkBackendBuilder
     */
    public function setServerIndex(int $serverIdx): ClerkBackendBuilder
    {
        $this->sdkConfig->serverIndex = $serverIdx;

        return $this;
    }

    /**
     * build is used to build the SDK with any of the configured options.
     *
     * @return ClerkBackend
     */
    public function build(): ClerkBackend
    {
        if ($this->sdkConfig->defaultClient === null) {
            $this->sdkConfig->defaultClient = new \GuzzleHttp\Client([
                'timeout' => 60,
            ]);
        }
        if ($this->sdkConfig->hasSecurity()) {
            $this->sdkConfig->securityClient = Utils\Utils::configureSecurityClient($this->sdkConfig->defaultClient, $this->sdkConfig->getSecurity());
        }
        if ($this->sdkConfig->securityClient === null) {
            $this->sdkConfig->securityClient = $this->sdkConfig->defaultClient;
        }

        return new ClerkBackend($this->sdkConfig);
    }
}
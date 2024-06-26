<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend;

class RedirectURLs
{
    private SDKConfiguration $sdkConfiguration;

    /**
     * @param  SDKConfiguration  $sdkConfig
     */
    public function __construct(SDKConfiguration $sdkConfig)
    {
        $this->sdkConfiguration = $sdkConfig;
    }

    /**
     * List all redirect URLs
     *
     * Lists all whitelisted redirect_urls for the instance
     *
     * @return \Clerk\Backend\Models\Operations\ListRedirectURLsResponse
     */
    public function listRedirectURLs(
    ): \Clerk\Backend\Models\Operations\ListRedirectURLsResponse {
        $baseUrl = $this->sdkConfiguration->getServerUrl();
        $url = Utils\Utils::generateUrl($baseUrl, '/redirect_urls');
        $options = ['http_errors' => false];
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = $this->sdkConfiguration->userAgent;

        $httpResponse = $this->sdkConfiguration->securityClient->request('GET', $url, $options);
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $statusCode = $httpResponse->getStatusCode();

        $response = new \Clerk\Backend\Models\Operations\ListRedirectURLsResponse();
        $response->statusCode = $statusCode;
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->redirectURLList = $serializer->deserialize((string) $httpResponse->getBody(), 'array<Clerk\Backend\Models\Components\RedirectURL>', 'json');
            }
        }

        return $response;
    }

    /**
     * Create a redirect URL
     *
     * Create a redirect URL
     *
     * @param  \Clerk\Backend\Models\Operations\CreateRedirectURLRequestBody  $request
     * @return \Clerk\Backend\Models\Operations\CreateRedirectURLResponse
     */
    public function createRedirectURL(
        ?\Clerk\Backend\Models\Operations\CreateRedirectURLRequestBody $request,
    ): \Clerk\Backend\Models\Operations\CreateRedirectURLResponse {
        $baseUrl = $this->sdkConfiguration->getServerUrl();
        $url = Utils\Utils::generateUrl($baseUrl, '/redirect_urls');
        $options = ['http_errors' => false];
        $body = Utils\Utils::serializeRequestBody($request, 'request', 'json');
        if ($body !== null) {
            $options = array_merge_recursive($options, $body);
        }
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = $this->sdkConfiguration->userAgent;

        $httpResponse = $this->sdkConfiguration->securityClient->request('POST', $url, $options);
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $statusCode = $httpResponse->getStatusCode();

        $response = new \Clerk\Backend\Models\Operations\CreateRedirectURLResponse();
        $response->statusCode = $statusCode;
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->redirectURL = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\RedirectURL', 'json');
            }
        } elseif ($httpResponse->getStatusCode() === 400 or $httpResponse->getStatusCode() === 422) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->clerkErrors = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\ClerkErrors', 'json');
            }
        }

        return $response;
    }

    /**
     * Retrieve a redirect URL
     *
     * Retrieve the details of the redirect URL with the given ID
     *
     * @param  string  $id
     * @return \Clerk\Backend\Models\Operations\GetRedirectURLResponse
     */
    public function getRedirectURL(
        string $id,
    ): \Clerk\Backend\Models\Operations\GetRedirectURLResponse {
        $request = new \Clerk\Backend\Models\Operations\GetRedirectURLRequest();
        $request->id = $id;
        $baseUrl = $this->sdkConfiguration->getServerUrl();
        $url = Utils\Utils::generateUrl($baseUrl, '/redirect_urls/{id}', \Clerk\Backend\Models\Operations\GetRedirectURLRequest::class, $request);
        $options = ['http_errors' => false];
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = $this->sdkConfiguration->userAgent;

        $httpResponse = $this->sdkConfiguration->securityClient->request('GET', $url, $options);
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $statusCode = $httpResponse->getStatusCode();

        $response = new \Clerk\Backend\Models\Operations\GetRedirectURLResponse();
        $response->statusCode = $statusCode;
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->redirectURL = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\RedirectURL', 'json');
            }
        } elseif ($httpResponse->getStatusCode() === 404) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->clerkErrors = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\ClerkErrors', 'json');
            }
        }

        return $response;
    }

    /**
     * Delete a redirect URL
     *
     * Remove the selected redirect URL from the whitelist of the instance
     *
     * @param  string  $id
     * @return \Clerk\Backend\Models\Operations\DeleteRedirectURLResponse
     */
    public function deleteRedirectURL(
        string $id,
    ): \Clerk\Backend\Models\Operations\DeleteRedirectURLResponse {
        $request = new \Clerk\Backend\Models\Operations\DeleteRedirectURLRequest();
        $request->id = $id;
        $baseUrl = $this->sdkConfiguration->getServerUrl();
        $url = Utils\Utils::generateUrl($baseUrl, '/redirect_urls/{id}', \Clerk\Backend\Models\Operations\DeleteRedirectURLRequest::class, $request);
        $options = ['http_errors' => false];
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = $this->sdkConfiguration->userAgent;

        $httpResponse = $this->sdkConfiguration->securityClient->request('DELETE', $url, $options);
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $statusCode = $httpResponse->getStatusCode();

        $response = new \Clerk\Backend\Models\Operations\DeleteRedirectURLResponse();
        $response->statusCode = $statusCode;
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->deletedObject = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\DeletedObject', 'json');
            }
        } elseif ($httpResponse->getStatusCode() === 404) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->clerkErrors = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\ClerkErrors', 'json');
            }
        }

        return $response;
    }
}
<?php

/**
 * Code generated by Speakeasy (https://speakeasyapi.dev). DO NOT EDIT.
 */

declare(strict_types=1);

namespace Clerk\Backend;

class EmailAndSMSTemplates
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
     * List all templates
     *
     * Returns a list of all templates.
     * The templates are returned sorted by position.
     *
     * @param  \Clerk\Backend\Models\Operations\TemplateType  $templateType
     * @return \Clerk\Backend\Models\Operations\GetTemplateListResponse
     */
    public function getTemplateList(
        \Clerk\Backend\Models\Operations\TemplateType $templateType,
    ): \Clerk\Backend\Models\Operations\GetTemplateListResponse {
        $request = new \Clerk\Backend\Models\Operations\GetTemplateListRequest();
        $request->templateType = $templateType;
        $baseUrl = $this->sdkConfiguration->getServerUrl();
        $url = Utils\Utils::generateUrl($baseUrl, '/templates/{template_type}', \Clerk\Backend\Models\Operations\GetTemplateListRequest::class, $request);
        $options = ['http_errors' => false];
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = $this->sdkConfiguration->userAgent;

        $httpResponse = $this->sdkConfiguration->securityClient->request('GET', $url, $options);
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $statusCode = $httpResponse->getStatusCode();

        $response = new \Clerk\Backend\Models\Operations\GetTemplateListResponse();
        $response->statusCode = $statusCode;
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->templateList = $serializer->deserialize((string) $httpResponse->getBody(), 'array<Clerk\Backend\Models\Components\Template>', 'json');
            }
        } elseif ($httpResponse->getStatusCode() === 400 or $httpResponse->getStatusCode() === 401 or $httpResponse->getStatusCode() === 422) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->clerkErrors = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\ClerkErrors', 'json');
            }
        }

        return $response;
    }

    /**
     * Retrieve a template
     *
     * Returns the details of a template
     *
     * @param  \Clerk\Backend\Models\Operations\PathParamTemplateType  $templateType
     * @param  string  $slug
     * @return \Clerk\Backend\Models\Operations\GetTemplateResponse
     */
    public function getTemplate(
        \Clerk\Backend\Models\Operations\PathParamTemplateType $templateType,
        string $slug,
    ): \Clerk\Backend\Models\Operations\GetTemplateResponse {
        $request = new \Clerk\Backend\Models\Operations\GetTemplateRequest();
        $request->templateType = $templateType;
        $request->slug = $slug;
        $baseUrl = $this->sdkConfiguration->getServerUrl();
        $url = Utils\Utils::generateUrl($baseUrl, '/templates/{template_type}/{slug}', \Clerk\Backend\Models\Operations\GetTemplateRequest::class, $request);
        $options = ['http_errors' => false];
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = $this->sdkConfiguration->userAgent;

        $httpResponse = $this->sdkConfiguration->securityClient->request('GET', $url, $options);
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $statusCode = $httpResponse->getStatusCode();

        $response = new \Clerk\Backend\Models\Operations\GetTemplateResponse();
        $response->statusCode = $statusCode;
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->template = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\Template', 'json');
            }
        } elseif ($httpResponse->getStatusCode() === 400 or $httpResponse->getStatusCode() === 401 or $httpResponse->getStatusCode() === 404) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->clerkErrors = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\ClerkErrors', 'json');
            }
        }

        return $response;
    }

    /**
     * Update a template for a given type and slug
     *
     * Updates the existing template of the given type and slug
     *
     * @param  \Clerk\Backend\Models\Operations\UpsertTemplatePathParamTemplateType  $templateType
     * @param  string  $slug
     * @param  ?\Clerk\Backend\Models\Operations\UpsertTemplateRequestBody  $requestBody
     * @return \Clerk\Backend\Models\Operations\UpsertTemplateResponse
     */
    public function upsertTemplate(
        \Clerk\Backend\Models\Operations\UpsertTemplatePathParamTemplateType $templateType,
        string $slug,
        ?\Clerk\Backend\Models\Operations\UpsertTemplateRequestBody $requestBody = null,
    ): \Clerk\Backend\Models\Operations\UpsertTemplateResponse {
        $request = new \Clerk\Backend\Models\Operations\UpsertTemplateRequest();
        $request->templateType = $templateType;
        $request->slug = $slug;
        $request->requestBody = $requestBody;
        $baseUrl = $this->sdkConfiguration->getServerUrl();
        $url = Utils\Utils::generateUrl($baseUrl, '/templates/{template_type}/{slug}', \Clerk\Backend\Models\Operations\UpsertTemplateRequest::class, $request);
        $options = ['http_errors' => false];
        $body = Utils\Utils::serializeRequestBody($request, 'requestBody', 'json');
        if ($body !== null) {
            $options = array_merge_recursive($options, $body);
        }
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = $this->sdkConfiguration->userAgent;

        $httpResponse = $this->sdkConfiguration->securityClient->request('PUT', $url, $options);
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $statusCode = $httpResponse->getStatusCode();

        $response = new \Clerk\Backend\Models\Operations\UpsertTemplateResponse();
        $response->statusCode = $statusCode;
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->template = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\Template', 'json');
            }
        } elseif ($httpResponse->getStatusCode() === 400 or $httpResponse->getStatusCode() === 401 or $httpResponse->getStatusCode() === 402 or $httpResponse->getStatusCode() === 403 or $httpResponse->getStatusCode() === 404 or $httpResponse->getStatusCode() === 422) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->clerkErrors = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\ClerkErrors', 'json');
            }
        }

        return $response;
    }

    /**
     * Revert a template
     *
     * Reverts an updated template to its default state
     *
     * @param  \Clerk\Backend\Models\Operations\RevertTemplatePathParamTemplateType  $templateType
     * @param  string  $slug
     * @return \Clerk\Backend\Models\Operations\RevertTemplateResponse
     */
    public function revertTemplate(
        \Clerk\Backend\Models\Operations\RevertTemplatePathParamTemplateType $templateType,
        string $slug,
    ): \Clerk\Backend\Models\Operations\RevertTemplateResponse {
        $request = new \Clerk\Backend\Models\Operations\RevertTemplateRequest();
        $request->templateType = $templateType;
        $request->slug = $slug;
        $baseUrl = $this->sdkConfiguration->getServerUrl();
        $url = Utils\Utils::generateUrl($baseUrl, '/templates/{template_type}/{slug}/revert', \Clerk\Backend\Models\Operations\RevertTemplateRequest::class, $request);
        $options = ['http_errors' => false];
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = $this->sdkConfiguration->userAgent;

        $httpResponse = $this->sdkConfiguration->securityClient->request('POST', $url, $options);
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $statusCode = $httpResponse->getStatusCode();

        $response = new \Clerk\Backend\Models\Operations\RevertTemplateResponse();
        $response->statusCode = $statusCode;
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->template = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\Template', 'json');
            }
        } elseif ($httpResponse->getStatusCode() === 400 or $httpResponse->getStatusCode() === 401 or $httpResponse->getStatusCode() === 402 or $httpResponse->getStatusCode() === 404) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->clerkErrors = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\ClerkErrors', 'json');
            }
        }

        return $response;
    }

    /**
     * Preview changes to a template
     *
     * Returns a preview of a template for a given template_type, slug and body
     *
     * @param  string  $templateType
     * @param  string  $slug
     * @param  ?\Clerk\Backend\Models\Operations\PreviewTemplateRequestBody  $requestBody
     * @return \Clerk\Backend\Models\Operations\PreviewTemplateResponse
     */
    public function previewTemplate(
        string $templateType,
        string $slug,
        ?\Clerk\Backend\Models\Operations\PreviewTemplateRequestBody $requestBody = null,
    ): \Clerk\Backend\Models\Operations\PreviewTemplateResponse {
        $request = new \Clerk\Backend\Models\Operations\PreviewTemplateRequest();
        $request->templateType = $templateType;
        $request->slug = $slug;
        $request->requestBody = $requestBody;
        $baseUrl = $this->sdkConfiguration->getServerUrl();
        $url = Utils\Utils::generateUrl($baseUrl, '/templates/{template_type}/{slug}/preview', \Clerk\Backend\Models\Operations\PreviewTemplateRequest::class, $request);
        $options = ['http_errors' => false];
        $body = Utils\Utils::serializeRequestBody($request, 'requestBody', 'json');
        if ($body !== null) {
            $options = array_merge_recursive($options, $body);
        }
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = $this->sdkConfiguration->userAgent;

        $httpResponse = $this->sdkConfiguration->securityClient->request('POST', $url, $options);
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $statusCode = $httpResponse->getStatusCode();

        $response = new \Clerk\Backend\Models\Operations\PreviewTemplateResponse();
        $response->statusCode = $statusCode;
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->object = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Operations\PreviewTemplateResponseBody', 'json');
            }
        } elseif ($httpResponse->getStatusCode() === 400 or $httpResponse->getStatusCode() === 401 or $httpResponse->getStatusCode() === 404 or $httpResponse->getStatusCode() === 422) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->clerkErrors = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\ClerkErrors', 'json');
            }
        }

        return $response;
    }

    /**
     * Toggle the delivery by Clerk for a template of a given type and slug
     *
     * Toggles the delivery by Clerk for a template of a given type and slug.
     * If disabled, Clerk will not deliver the resulting email or SMS.
     * The app developer will need to listen to the `email.created` or `sms.created` webhooks in order to handle delivery themselves.
     *
     * @param  \Clerk\Backend\Models\Operations\ToggleTemplateDeliveryPathParamTemplateType  $templateType
     * @param  string  $slug
     * @param  ?\Clerk\Backend\Models\Operations\ToggleTemplateDeliveryRequestBody  $requestBody
     * @return \Clerk\Backend\Models\Operations\ToggleTemplateDeliveryResponse
     */
    public function toggleTemplateDelivery(
        \Clerk\Backend\Models\Operations\ToggleTemplateDeliveryPathParamTemplateType $templateType,
        string $slug,
        ?\Clerk\Backend\Models\Operations\ToggleTemplateDeliveryRequestBody $requestBody = null,
    ): \Clerk\Backend\Models\Operations\ToggleTemplateDeliveryResponse {
        $request = new \Clerk\Backend\Models\Operations\ToggleTemplateDeliveryRequest();
        $request->templateType = $templateType;
        $request->slug = $slug;
        $request->requestBody = $requestBody;
        $baseUrl = $this->sdkConfiguration->getServerUrl();
        $url = Utils\Utils::generateUrl($baseUrl, '/templates/{template_type}/{slug}/toggle_delivery', \Clerk\Backend\Models\Operations\ToggleTemplateDeliveryRequest::class, $request);
        $options = ['http_errors' => false];
        $body = Utils\Utils::serializeRequestBody($request, 'requestBody', 'json');
        if ($body !== null) {
            $options = array_merge_recursive($options, $body);
        }
        $options['headers']['Accept'] = 'application/json';
        $options['headers']['user-agent'] = $this->sdkConfiguration->userAgent;

        $httpResponse = $this->sdkConfiguration->securityClient->request('POST', $url, $options);
        $contentType = $httpResponse->getHeader('Content-Type')[0] ?? '';

        $statusCode = $httpResponse->getStatusCode();

        $response = new \Clerk\Backend\Models\Operations\ToggleTemplateDeliveryResponse();
        $response->statusCode = $statusCode;
        $response->contentType = $contentType;
        $response->rawResponse = $httpResponse;
        if ($httpResponse->getStatusCode() === 200) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->template = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\Template', 'json');
            }
        } elseif ($httpResponse->getStatusCode() === 400 or $httpResponse->getStatusCode() === 401 or $httpResponse->getStatusCode() === 404) {
            if (Utils\Utils::matchContentType($contentType, 'application/json')) {
                $serializer = Utils\JSON::createSerializer();
                $response->clerkErrors = $serializer->deserialize((string) $httpResponse->getBody(), 'Clerk\Backend\Models\Components\ClerkErrors', 'json');
            }
        }

        return $response;
    }
}
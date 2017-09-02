<?php

namespace Shopify;

use GuzzleHttp\Client;

class PrivateApi implements ApiInterface
{
    protected $api_key;
    protected $password;
    protected $shared_secret;
    protected $myshopify_domain;
    protected $http_handler;

    public function getApiKey()
    {
        return $this->api_key;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSharedSecret()
    {
        return $this->shared_secret;
    }

    public function setMyshopifyDomain($myshopifyDomain)
    {
        $this->myshopify_domain = $myshopifyDomain;
        return $this;
    }

    public function getMyshopifyDomain()
    {
        return $this->myshopify_domain;
    }

    public function setHttpHandler(Client $httpHandler)
    {
        $this->http_handler = $httpHandler;
        return $this;
    }

    public function getHttpHandler()
    {
        $this->init();
        return $this->http_handler;
    }

    public function init()
    {
        $args = array(
        'base_uri' => "https://{$this->myshopify_domain}",
        'headers' => array(
            'Authorization' => $this->createBasicAuthHeader(
                $this->api_key,
                $this->password
            )
        );
        $this->http_handler = new Client($args);
    }

    protected function createBasicAuthHeader($apiKey, $password)
    {
        $input = "{$apiKey}:{$password}";
        $input = base64_encode($input);
        return "Basic {$input}";
    }
}

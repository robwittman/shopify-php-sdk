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

    public function setApiKey($apiKey)
    {
        $this->api_key = $apiKey;
        return $this;
    }

    public function getApiKey()
    {
        return $this->api_key;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setSharedSecret($sharedSecret)
    {
        $this->shared_secret = $sharedSecret;
        return $this;
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

    public function getMyshopifyDomain()
    {
        return $this->myshopify_domain;
    }

    public function init()
    {
        if (is_null($this->http_handler)) {
            $args = array(
                'base_uri' => "https://{$this->myshopify_domain}",
                'headers' => array(
                    'Authorization' => $this->createBasicAuthHeader(
                        $this->api_key,
                        $this->password
                    )
                )
            );
            $this->http_handler = new Client($args);
        }
    }

    public function createBasicAuthHeader($apiKey, $password)
    {
        $input = "{$apiKey}:{$password}";
        $input = base64_encode($input);
        return "Basic {$input}";
    }
}

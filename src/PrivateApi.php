<?php

namespace Shopify;

use GuzzleHttp\Client;

class PrivateApi extends AbstractApi
{
    protected $api_key;
    protected $password;
    protected $shared_secret;

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

    public function init()
    {
        $args = array(
            'base_uri' => sprintf(
                "https://%s/admin/api/%s/",
                $this->myshopify_domain,
                $this->getApiVersion()
            ),
            'headers' => array(
                'Authorization' => $this->createBasicAuthHeader(
                    $this->api_key,
                    $this->password
                )
            )
        );
        $this->http_handler = new Client($args);
    }

    public function createBasicAuthHeader($apiKey, $password)
    {
        $input = "{$apiKey}:{$password}";
        $input = base64_encode($input);
        return "Basic {$input}";
    }
}

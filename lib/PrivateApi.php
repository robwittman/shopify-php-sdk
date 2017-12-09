<?php

namespace Shopify;

use GuzzleHttp\Client;
use Shopify\Exception\InvalidPropertyException;

class PrivateApi extends AbstractApi
{
    protected $api_key;
    protected $password;
    protected $shared_secret;

    public function __construct(array $options = array())
    {
        foreach ($options as $key => $value) {
            if (!property_exists($this, $key)) {
                throw new \InvalidPropertyException(
                    "Property '{$key}' does not exist on \Shopify\Api"
                );
            }
            $this->{$key} = $value;
        }
    }

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

    protected function createBasicAuthHeader($apiKey, $password)
    {
        $input = "{$apiKey}:{$password}";
        $input = base64_encode($input);
        return "Basic {$input}";
    }
}

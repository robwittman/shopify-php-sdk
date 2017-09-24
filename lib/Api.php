<?php

namespace Shopify;

use GuzzleHttp\Client;
use Shopify\Storage\PersistentStorageInterface;
use Shopify\Storage\SessionStorage;
use Shopify\Helper\OAuthHelper;
use Psr\Log\LoggerInterface;
use Shopify\Exception\InvalidPropertyException;

class Api implements ApiInterface
{
    protected $api_key;
    protected $api_secret;
    protected $access_token;
    protected $myshopify_domain;
    protected $http_handler;
    protected $storage;
    protected $logger;

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
        if (is_null($this->api_key)) {
            $this->loadApiKeyFromEnv();
        }
        return $this->api_key;
    }

    public function getApiSecret()
    {
        if (is_null($this->api_secret)) {
            $this->loadApiSecretFromEnv();
        }
        return $this->api_secret;
    }

    public function getMyshopifyDomain()
    {
        return $this->myshopify_domain;
    }
    
    public function setMyshopifyDomain($domain)
    {
        $this->myshopify_domain = $domain;
        $this->init();
        return $this;
    }

    public function setAccessToken($accessToken)
    {
        $this->access_token = $accessToken;
        $this->init();
        return $this;
    }

    public function getAccessToken()
    {
        return $this->access_token;
    }

    public function setHttpHandler(Client $httpHandler)
    {
        $this->http_handler = $httpHandler;
        return $this;
    }

    public function getHttpHandler()
    {
        if (is_null($this->http_handler)) {
            $this->init();
        }
        return $this->http_handler;
    }

    public function setStorageInterface(PersistentStorageInterface $storage)
    {
        $this->storage = $storage;
        return $this;
    }

    public function getStorageInterface()
    {
        if (is_null($this->storage)) {
            $this->storage = new SessionStorage();
        }
        return $this->storage;
    }

    /**
     * Set our LoggerInterface
     *
     * @param Logger $logger
     */
    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
        return $this;
    }

    public function init()
    {
        $args = array();
        if (!is_null($this->myshopify_domain)) {
            $args['base_uri'] = sprintf("https://%s", $this->myshopify_domain);
        }
        if (!is_null($this->access_token)) {
            $args['headers']['X-Shopify-Access-Token'] = $this->access_token;
        }
        $this->http_handler = new Client($args);
    }

    public function getOAuthHelper()
    {
        return new OAuthHelper($this, $this->getStorageInterface());
    }
}

<?php

namespace Shopify;

use GuzzleHttp\Client;
use Shopify\Storage\PersistentStorageInterface;
use Shopify\Storage\SessionStorage;
use Shopify\Helper\OAuthHelper;
use Psr\Log\LoggerInterface as Logger;

class Api implements ApiInterface
{
    const SHOPIFY_API_KEY_NAME = 'SHOPIFY_API_KEY';
    const SHOPIFY_API_SECRET_NAME = 'SHOPIFY_API_SECRET';

    protected $api_key;
    protected $api_secret;
    protected $access_token;
    protected $myshopify_domain;
    protected $http_handler;
    protected $storage;
    protected $meta = array();
    protected $logger;

    public function setApiKey($apiKey)
    {
        $this->api_key = $apiKey;
        return $this;
    }

    public function getApiKey()
    {
        if (is_null($this->api_key)) {
            $this->loadApiKeyFromEnv();
        }
        return $this->api_key;
    }

    public function setApiSecret($apiSecret)
    {
        $this->api_secret = $apiSecret;
        return $this;
    }

    public function getApiSecret()
    {
        if (is_null($this->api_secret)) {
            $this->loadApiSecretFromEnv();
        }
        return $this->api_secret;
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

    public function setAccessToken($accessToken)
    {
        $this->access_token = $accessToken;
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
        $this->init();
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

    public function setLogger(Logger $loggger)
    {
        $this->logger = $logger;
        return $this;
    }

    public function init()
    {
        if (is_null($this->http_handler)) {
            $args = array();
            if (is_null(!$this->myshopify_domain)) {
                $args['base_uri'] = sprintf("https://%s");
            }
            if (!is_null(!$this->access_token)) {
                $args['headers']['X-Shopify-Access-Token'] = $this->access_token;
            }
            $this->http_handler = new Client($args);
        }
    }

    public function getOAuthHelper()
    {
        return new OAuthHelper($this, $this->getStorageInterface());
    }

    public function loadApiKeyFromEnv()
    {
        $apiKeyEnvName = static::SHOPIFY_API_KEY_NAME;
        if ($api_key = getenv($apiKeyEnvName)) {
            $this->setApiKey($api_key);
            return;
        }
        throw new Shopify\Exception\SdkException(
            "Attempted loading api_key from environment, but wasn't found.".
            " Please set using `export {$apiKeyEnvName}=<api_key>`"
        );
    }

    public function loadApiSecretFromEnv()
    {
        $apiSecretEnvName = static::SHOPIFY_API_SECRET_NAME;
        if ($api_secret = getenv($apiSecretEnvName)) {
            $this->setApiSecret($api_secret);
            return;
        }
        throw new Shopify\Exception\SdkException(
            "Attempted loading api_secret from environment, but wasn't found.".
            " Please set using `export {$apiSecretEnvName}=<api_secret>`"
        );
    }
}

<?php

namespace Shopify;

use Shopify\Storage\PersistentStorageInterface;
use Shopify\Storage\SessionStorage;
use Shopify\Helper\OAuthHelper;
use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;

class Api extends AbstractApi
{
    /**
     * Shopify API Key
     * @var string
     */
    protected $api_key;

    /**
     * Shopify API Secret
     * @var string
     */
    protected $api_secret;

    /**
     * OAuth access token
     * @var string
     */
    protected $access_token;

    /**
     * Storage Interface, used for storing OAuth nonces
     * @var PersistentStorageInterface
     */
    protected $storage;

    /**
     * Get our API key
     * @return string
     */
    public function getApiKey()
    {
        if (is_null($this->api_key)) {
            $this->loadApiKeyFromEnv();
        }
        return $this->api_key;
    }

    /**
     * Get our API secret
     * @return string
     */
    public function getApiSecret()
    {
        if (is_null($this->api_secret)) {
            $this->loadApiSecretFromEnv();
        }
        return $this->api_secret;
    }

    /**
     * Get current store domain
     * @return string
     */
    public function getMyshopifyDomain()
    {
        return $this->myshopify_domain;
    }

    /**
     * Set the current store domain. Initialize
     * a new client, with new details
     *
     * @param string $domain
     */
    public function setMyshopifyDomain($domain)
    {
        $this->myshopify_domain = $domain;
        $this->init();
        return $this;
    }

    /**
     * Set current access token, and initialize a
     * new client instance
     *
     * @param string $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->access_token = $accessToken;
        $this->init();
        return $this;
    }

    /**
     * Get the current access token
     * @return string
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * Set our persistent storage interface
     * @param PersistentStorageInterface $storage
     */
    public function setStorageInterface(PersistentStorageInterface $storage)
    {
        $this->storage = $storage;
        return $this;
    }

    /**
     * Initialize if not set, and return our storge interface
     * @return PersistentStorageInterface
     */
    public function getStorageInterface()
    {
        if (is_null($this->storage)) {
            $this->storage = new SessionStorage();
        }
        return $this->storage;
    }

    /**
     * {@inheritDoc}
     */
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

    /**
     * Return an instance of our OAuth helper
     * @return OAuthHelper
     */
    public function getOAuthHelper()
    {
        return new OAuthHelper($this, $this->getStorageInterface());
    }
}

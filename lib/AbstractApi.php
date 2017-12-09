<?php

namespace Shopify;

use GuzzleHttp\Client;
use Psr\Log\LoggerInterface;

abstract class AbstractApi implements ApiInterface
{
    /**
     * Domain of the Shopify store
     * @var string
     */
    protected $myshopify_domain;

    /**
     * Guzzle client for making requests
     * @var Client
     */
    protected $http_handler;

    /**
     * Logging interface
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Build our private API instance
     *
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        foreach ($options as $key => $value) {
            if (!property_exists($this, $key)) {
                throw new \InvalidArgumentException(
                    "Property '{$key}' does not exist on ".get_called_class()
                );
            }
            $this->{$key} = $value;
        }
    }

    /**
     * Set our Client instance
     *
     * @param Client $httpHandler
     */
    public function setHttpHandler(Client $httpHandler)
    {
        $this->http_handler = $httpHandler;
        return $this;
    }

    /**
     * Get our client instance
     *
     * @return Client
     */
    public function getHttpHandler()
    {
        if (is_null($this->http_handler)) {
            $this->init();
        }
        return $this->http_handler;
    }

    /**
     * Set our LoggerInterface
     *
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
        return $this;
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
     * Get our loggerInterface
     *
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }
    
    /**
     * Initialize our Client, using settings based on the app type
     * @var void
     */
    abstract public function init();
}

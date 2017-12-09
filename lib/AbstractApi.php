<?php

namespace Shopify;

use Shopify\Exception\InvalidPropertyException;
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
                throw new \InvalidPropertyException(
                    "Property '{$key}' does not exist on \Shopify\Api"
                );
            }
            $this->{$key} = $value;
        }
    }

    /**
     * Set our Client instance
     *
     * @param Client $httpHandler [description]
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

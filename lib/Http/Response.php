<?php
/**
 * \Shopify\Http\Response
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 */
namespace Shopify\Http;

class Response
{
    /**
     * API Response
     * @var string
     */
    protected $rawBody;

    /**
     * Decoded API Response
     * @var mixed
     */
    protected $jsonBody;

    /**
     * Response HTTP Code
     * @var integer
     */
    protected $http_code;

    /**
     * Response headers
     * @var array
     */
    protected $headers;

    public function __construct($rawBody, $code, array $headers = array())
    {
        $this->rawBody = $rawBody;
        $this->http_code = $code;
        $this->headers = $headers;
        $this->jsonBody = json_decode($this->rawBody);
    }

    /**
     * Fetch our response headers
     * @param  string $key
     * @return mixed
     */
    public function getHeaders($key = FALSE)
    {
        if(!$key)
        {
            return $this->headers;
        }
        return isset($this->headers[$key]) ? $this->headers[$key] : NULL;
    }

    /**
     * Return our HTTP Code
     * @return integer
     */
    public function getHttpCode()
    {
        return $this->http_code;
    }

    /**
     * Fetch the raw body content of our response
     * @return string
     */
    public function getRawBody()
    {
        return $this->rawBody;
    }

    /**
     * Retrieve the JSON deccoded response
     * @return mixed
     */
    public function getJsonBody()
    {
        return json_decode($this->rawBody);
    }

    /**
     * Get the Shopify Request ID
     * @return string
     */
    public function getRequestId()
    {
        return $this->getHeaders('X-Request-ID');
    }

    /**
     * Get the Shopify Call Limit Headers
     * @return string
     */
    public function getCallLimit()
    {
        return $this->getHeaders('X-Shopify-Api-Call-Limit');
    }
}

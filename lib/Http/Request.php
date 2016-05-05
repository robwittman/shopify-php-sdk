<?php
/**
 * \Shopify\Http\Request
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 */
namespace Shopify\Http;

class Request
{
    /**
     * API Endpoint to request
     * @var string
     */
    protected $path;

    /**
     * HTTP Method to use
     * @var string
     */
    protected $method;

    /**
     * Parameters to use
     *
     * If method == 'get', will be URL encoded as query string. if POST, it will be
     * JSON encoded into the body of the request
     * @var array
     */
    protected $params;

    /**
     * Headers to send with request
     * @var array
     */
    protected $headers = array();

    /**
     * Request body
     * @var mixed
     */
    protected $body;

    public function __construct($path, $method = 'GET', $params = array(), $headers = array())
    {

    }

    /**
     * Fetch headers
     * @param  string $key
     * @return mixed
     */
    public function getHeader($key = NULL)
    {
        if(is_null($key))
        {
            return $this->headers;
        }
        return isset($this->headers[$key]) ? $this->headers[$key] : FALSE;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getPath()
    {
        return $this->path;
    }
}

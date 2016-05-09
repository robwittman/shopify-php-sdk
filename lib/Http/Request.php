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
    protected $params = array();

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

    public function __construct($path, $method = 'GET', $params = array(), $headers = array(), $jsonify = FALSE)
    {
        $this->path = $path;
        $this->method = $method;
        $this->params = $params;
        $this->headers = $headers;
        if($method == 'POST' || $method == 'PUT')
        {
            $this->body = empty($params) ? NULL : json_encode($params);
        }
    }

    /**
     * Fetch headers
     * @param  string $key
     * @return mixed
     */
    public function getHeaders($key = NULL)
    {
        if(is_null($key))
        {
            return $this->headers;
        }
        return isset($this->headers[$key]) ? $this->headers[$key] : FALSE;
    }

    public function getBody()
    {
        return $this->body;
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

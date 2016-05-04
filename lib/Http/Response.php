<?php

namespace Shopify\Http;

class Response
{
    protected $body;
    protected $http_code;
    protected $headers;
    public function __construct($body, int $code, array $headers)
    {
        $this->body = $body;
        $this->http_code = $code;
        $this->headers = $headers;
    }

    public function getHeaders($key = FALSE)
    {
        if(!$key)
        {
            return $this->headers;
        }
        return isset($this->headers[$key]) ? $this->headers[$key] : NULL;
    }

    public function getHttpCode()
    {
        return $this->http_code;
    }

    public function getRawBody()
    {
        return $this->body;
    }

    public function getJsonBody()
    {
        return json_decode($this->body);
    }

    public function getRequestId()
    {
        return $this->getHeaders('X-Request-ID');
    }

    public function getCallLimit()
    {
        return $this->getHeaders('X-Shopify-Api-Call-Limit');
    }
}

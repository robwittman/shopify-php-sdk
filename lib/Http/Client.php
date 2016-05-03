<?php

namespace Shopify\Http;

use Shopify\Shopify;
use Shopify\Util;
use Shopify\Exception;

class Client
{
    const TIMEOUT;
    const CONNECT_TIMEOUT;

    private static $instance;
    protected $options;
    protected $headers;

    public function __construct($options = NULL)
    {
        $this->options = $options
    }

    public function getOpt()
    {
        return $this->options;
    }

    public function setHeader($key, $value = NULL)
    {
        // if(is_array($key))
        // {
        //     foreach($key as $k => $v)
        //     {
        //         $this->setHeader()
        //     }
        // }
    }
    public function request($method, $url, $headers, $params)
    {
        return file_get_contents($url);
    }
}

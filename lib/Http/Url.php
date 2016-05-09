<?php

namespace Shopify\Http;

class Url
{
    protected $scheme;

    protected $host;

    protected $port;

    protected $user;

    protected $pass;

    protected $path;

    protected $query;

    protected $fragment;

    protected $full_uri;

    public function __construct($url = NULL)
    {
        if(is_null($url))
        {
            $url = $_SERVER['REQUEST_URI'];
        }
        $this->full_uri = $url;
        $parts = parse_url($this->full_uri);

    }
}

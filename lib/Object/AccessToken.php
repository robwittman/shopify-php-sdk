<?php

namespace Shopify\Object;

class AccessToken
{
    public $access_token;

    public $scopes;

    public function __construct(array $data)
    {
        $this->access_token = $data['access_token'];
        $this->scopes = $data['scopes'];
    }
}

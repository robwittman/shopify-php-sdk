<?php

namespace Shopify;

use Shopify\Util;
use Shopify\Http;
use Shopify\Exception;

class AccessToken extends AbstractResource
{
    protected $token;
    protected $scope;

    public function __construct($data)
    {
        $this->token = $data->access_token;
        $this->scope = $data->scope;
    }

    public function __toString()
    {
        return $this->token;
    }

    public function scopes()
    {
        return $this->scope;
    }
    public static function createFromCode($code)
    {
        return self::call('oauth/access_token', 'POST', array(
            'code' => $code,
            'client_id' => \Shopify\Shopify::api_key(),
            'client_secret' => \Shopify\Shopify::api_secret()
        ), false);
    }
}

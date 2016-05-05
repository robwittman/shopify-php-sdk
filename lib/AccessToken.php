<?php

/**
 * \Shopify\AccessToken
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/guides/authentication
 */
namespace Shopify;

use Shopify\Util;
use Shopify\Http;
use Shopify\Exception;

class AccessToken extends AbstractResource
{
    /**
     * Access token
     * @var string
     */
    protected $token;

    /**
     * Comma separated string of permissions
     * @var string
     */
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

    /**
     * Return the scopes for this access token
     * @return string
     */
    public function scopes()
    {
        return $this->scope;
    }

    /**
     * Generate a new access token from our OAuth code
     * @param  string $code
     * @return string
     */
    public static function createFromCode($code)
    {
        return self::call('oauth/access_token', 'POST', array(
            'code' => $code,
            'client_id' => \Shopify\Shopify::api_key(),
            'client_secret' => \Shopify\Shopify::api_secret()
        ), false);
    }
}

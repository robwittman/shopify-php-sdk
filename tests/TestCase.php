<?php

namespace Shopify;

class TestCase extends \PHPUnit_Framework_TestCase
{
    protected $client;
    private $opts = [
        'test' => TRUE,
        'debug' => FALSE,
        'strict' => FALSE,
        'api_key' => '1231g3g24gq3v',
        'api_secret' => "asdpaosidcoaij23r",
        'redirect_uri' => "https://some_randomg_url",
        'access_token' => 'asdifpaoisdjpfaoijsdfp',
        'permissions' => "read_products,write_products",
        'store' => "dev.myshopify.com"
    ];
    public function setUp()
    {
        Shopify::init($this->opts);
    }
}

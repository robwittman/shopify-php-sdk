<?php

namespace Shopify;

class AuthTest extends TestCase
{
    // private $opts = [
    //     'test' => TRUE,
    //     'debug' => FALSE,
    //     'strict' => FALSE,
    //     'api_key' => '1231g3g24gq3v',
    //     'api_secret' => "asdpaosidcoaij23r",
    //     'redirect_uri' => "https://some_randomg_url",
    //     'access_token' => 'asdifpaoisdjpfaoijsdfp',
    //     'permissions' => "read_products,write_products",
    //     'store' => "dev.myshopify.com"
    // ];

    public function testGenerateNonce()
    {
        $nonce = Auth::generateNonce();
        $this->assertEquals($nonce, hash_hmac('sha256', Shopify::store().'.'.time(), Shopify::api_secret()));
    }

    public function testSetNonce()
    {
        Auth::setNonce('some-random-string');
        $this->assertEquals(Auth::getNonce(), 'some-random-string');
    }

    public function testAuthorizationUrl()
    {
        Auth::setNonce('some-random-string');
        $url = Auth::authorizationUrl();
        $query_string = parse_url($url, PHP_URL_QUERY);
        $params = [];
        parse_str($query_string, $params);
        $this->assertNotNull($params['state']);
        $this->assertEquals($params['state'], 'some-random-string');
    }
}

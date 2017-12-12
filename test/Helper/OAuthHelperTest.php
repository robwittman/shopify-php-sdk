<?php

namespace Shopify\Test\Helper;

use Shopify\Api;
use Shopify\Helper\OAuthHelper;
use Shopify\Test\TestCase;

class OAuthHelperTest extends TestCase
{
    public function setUp()
    {
        $this->api = $this->getApi(array(
            'api_key' => 'api-key',
            'api_secret' => 'api-secret',
            'myshopify_domain' => 'test.shopify.com'
        ));
        $this->helper = $this->api->getOAuthHelper();
    }

    public function testInstantiate()
    {
        $this->assertInstanceOf(OAuthHelper::class, $this->helper);
    }

    public function testGetAuthorizationUrl()
    {
        $authUrl = $this->helper->getAuthorizationUrl('http://google.com', 'read_products');
        $chunks = parse_url($authUrl);
        $this->assertEquals($chunks['host'], 'test.shopify.com');
        $this->assertEquals($chunks['path'], '/admin/oauth/authorize');
        $params = [];
        parse_str($chunks['query'], $params);
        $this->assertEquals($params['client_id'], 'api-key');
        $this->assertEquals(urldecode($params['redirect_uri']), 'http://google.com');
        $this->assertEquals($params['scope'], 'read_products');
        $this->assertNotNull($params['state']);
    }

    public function testGetPseudoRandomString()
    {
        $string = $this->helper->getPseudoRandomString();
        $this->assertEquals(strlen($string), 32);
    }
}

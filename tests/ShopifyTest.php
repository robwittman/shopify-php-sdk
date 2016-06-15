<?php

namespace Shopify;

class ShopifyTest extends TestCase
{
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

    public function testInit()
    {
        Shopify::init($this->opts);
        $this->assertInstanceOf('Shopify\Shopify', Shopify::instance());
    }

    /**
     * @depends testInit
     */
    public function testTestValue()
    {
        $this->assertEquals($this->opts['test'], Shopify::test());
    }

    /**
     * @depends testInit
     */
    public function testStrictValue()
    {
        $this->assertEquals($this->opts['strict'], Shopify::strict());
    }

    /**
     * @depends testInit
     */
    public function testDebugValue()
    {
        $this->assertEquals($this->opts['debug'], Shopify::debug());
    }

    /**
     * @depends testInit
     */
    public function testApiKeyValue()
    {
        $this->assertEquals($this->opts['api_key'], Shopify::api_key());
    }

    /**
     * @depends testInit
     */
    public function testApiSecretValue()
    {
        $this->assertEquals($this->opts['api_secret'], Shopify::api_secret());
    }

    /**
     * @depends testInit
     */
    public function testRedirectURIValue()
    {
        $this->assertEquals($this->opts['redirect_uri'], Shopify::redirect_uri());
    }

    /**
     * @depends testInit
     */
    public function testAccessTokenValue()
    {
        $this->assertEquals($this->opts['access_token'], Shopify::access_token());
    }

    /**
     * @depends testInit
     */
    public function testStoreValue()
    {
        $this->assertEquals($this->opts['store'], Shopify::store());
    }

    /**
     * @depends testInit
     */
    public function testPermissionsValue()
    {
        $this->assertEquals($this->opts['permissions'], Shopify::permissions());
    }

    /**
     * @depends testInit
     */
    public function testBaseUrl()
    {
        $this->assertEquals(Shopify::baseUrl(), sprintf("https://%s/admin/", 'dev.myshopify.com'));
    }
}

<?php

namespace Shopify\Test;

use Shopify\Api;
use Shopify\Helper\OAuthHelper;
use GuzzleHttp\Client;
use Shopify\Storage\MemoryStorage;
use Shopify\Storage\SessionStorage;

class ApiTest extends ShopifyTest
{
    public function testApiKey()
    {
        $api = new Api(array(
            'api_key' => 'test-api-key'
        ));
        $this->assertEquals($api->getApiKey(), 'test-api-key');
    }

    public function testApiSecret()
    {
        $api = new Api(array(
            'api_secret' => 'test-api-secret'
        ));
        $this->assertEquals($api->getApiSecret(), 'test-api-secret');
    }

    public function testMyshopifyDomain()
    {
        $api = new Api();
        $api->setMyshopifyDomain('test.myshopify.com');
        $this->assertEquals($api->getMyshopifyDomain(), 'test.myshopify.com');
    }

    public function testAccessToken()
    {
        $api = new Api();
        $api->setAccessToken('test-access-token');
        $this->assertEquals($api->getAccessToken(), 'test-access-token');
    }

    public function testGetApiCredsFromEnv()
    {
        putenv(Api::SHOPIFY_API_KEY_NAME.'=envapikey');
        putenv(Api::SHOPIFY_API_SECRET_NAME.'=envapisecret');
        $api = new Api();
        $this->assertEquals($api->getApiKey(), 'envapikey');
        $this->assertEquals($api->getApiSecret(), 'envapisecret');
        putenv(Api::SHOPIFY_API_KEY_NAME);
        putenv(Api::SHOPIFY_API_SECRET_NAME);
    }

    public function testHttpHandler()
    {
        $client = new Client();
        $api = new Api();
        $api->setHttpHandler($client);
        $this->assertEquals($api->getHttpHandler(), $client);
    }

    public function testInitDefaultClient()
    {
        $api = new Api();
        $client = $api->getHttpHandler();
        $this->assertInstanceOf(Client::class, $client);
    }

    public function testStorageInterface()
    {
        $api = new Api();
        $storage = new MemoryStorage();
        $api->setStorageInterface($storage);
        $this->assertEquals($api->getStorageInterface(), $storage);
    }

    public function testIntiDefaultStorage()
    {
        $api = new Api();
        $storage = $api->getStorageInterface();
        $this->assertInstanceOf(SessionStorage::class, $storage);
    }

    public function testGetOAuthHelper()
    {
        $api = $this->getApi(array(
            'api_key' => 'api-key',
            'api_secret' => 'api-secret',
            'myshopify_domain' => 'test.shopify.com'
        ));
        $helper = $api->getOAuthHelper();
        $this->assertInstanceOf(OAuthHelper::class, $helper);
    }
}

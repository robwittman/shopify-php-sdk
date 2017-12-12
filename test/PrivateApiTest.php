<?php

namespace Shopify\Test;

use Shopify\PrivateApi;
use GuzzleHttp\Client;

class PrivateApiTest extends TestCase
{
    public function testCreateBasicAuthHeader()
    {
        $api = new PrivateApi();
        $header = $api->createBasicAuthHeader('username', 'password');
        $this->assertEquals($header, 'Basic dXNlcm5hbWU6cGFzc3dvcmQ=');
    }

    public function testApiKey()
    {
        $api = new PrivateApi(array(
            'api_key' => 'api-key'
        ));
        $this->assertEquals($api->getApiKey(), 'api-key');
    }

    public function testPassword()
    {
        $api = new PrivateApi(array(
            'password' => 'api-passqword'
        ));
        $this->assertEquals($api->getPassword(), 'api-passqword');
    }

    public function testSharedSecret()
    {
        $secret = 'test-shared-secret';
        $api = new PrivateApi(array(
            'shared_secret' => $secret
        ));
        $this->assertEquals($api->getSharedSecret(), $secret);
    }

    public function testHttpHandler()
    {
        $client = new Client();
        $api = new PrivateApi();
        $api->setHttpHandler($client);
        $this->assertEquals($api->getHttpHandler(), $client);
    }

    public function testMyshopifyDomain()
    {
        $domain = 'test.myshopify.com';
        $api = new PrivateApi();
        $api->setMyshopifyDomain($domain);
        $this->assertEquals($api->getMyshopifyDomain(), $domain);
    }
}

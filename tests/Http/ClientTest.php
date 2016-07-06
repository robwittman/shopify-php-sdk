<?php

namespace Shopify;

class ClientTest extends TestCase
{
    protected $client;

    public function setUp()
    {
        $this->client = new Http\Client();
    }

    /**
     * @expectedException \Shopify\Exception\ApiException
     */
    public function testClientInvalidDomain()
    {
        $request = new Http\Request('0.0.0.0', 'GET', [], []);
        $response = $this->client->request($request);
    }

    /**
     * @expectedException \Shopify\Exception\CurlException
     */
    public function testClientInitFailure()
    {
        $request = new Http\Request('http://test-shop/admin/products.json' ,'GET', [], []);
        $response = $this->client->request($request);
    }
}

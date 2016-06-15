<?php

namespace Shopify;

class TestClientTest extends TestCase
{
    protected $client;

    public function setUp()
    {
        $this->client = new Http\TestClient();
    }
    public function testClientTestDelete()
    {
        $request = new Http\Request("http://google.com", 'DELETE', array(), array());
        $response = $this->client->request($request);
        $this->assertEquals((object) [], $response->getJsonBody());
    }

    public function testClientTestCreate()
    {
        $object = [
            'product' => [
                'title' => "something"
            ]
        ];
        $request = new Http\Request("http://google.com", 'POST', $object, array());
        $response = $this->client->request($request);
        $this->assertNotNull($response->getJsonBody()->product->id);
    }

    public function testClientCount()
    {
        $request = new Http\Request("http://google.com/count.json", "GET", array(), array());
        $response = $this->client->request($request);

        $this->assertInternalType("int", $response->getJsonbody()->count);
    }
}

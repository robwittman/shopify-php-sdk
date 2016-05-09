<?php

namespace Shopify;

class ResponseTest extends TestCase
{
    private $response;

    public function setUp()
    {
        parent::setUp();
        $this->response = new Http\Response('[]', 200);
    }

    public function testRawBody()
    {
        $this->assertEquals($this->response->getRawBody(), '[]');
    }
    public function testJsonBody()
    {
        $this->assertTrue(!is_null($this->response->getJsonBody()));
    }

    public function testInvalidJsonBodyIsNull()
    {
        $tmp_response = new Http\Response(NULL, 200);
        $this->assertTrue(is_null($tmp_response->getJsonBody()));
    }

    public function testResponseHeaders()
    {
        $this->assertTrue(is_array($this->response->getHeaders()));
    }

    public function testResponseCode()
    {
        $this->assertEquals($this->response->getHttpCode(), 200);
    }
}

<?php

namespace Shopify;

class RequestTest extends TestCase
{
    private $request;
    public function setUp()
    {
        parent::setUp();
        $this->request = new Http\Request('http://google.com', 'GET', array('test' => 'testing'), array('X-Shopify-Access-Token' => 'testing access token'));
    }

    public function testPath()
    {
        $this->assertEquals('http://google.com', $this->request->getPath());
    }

    public function testMethod()
    {
        $this->assertEquals('GET', $this->request->getMethod());
    }

    public function testParamsIsArray()
    {
        $this->assertTrue(is_array($this->request->getParams()));
    }

    public function testParamsValueExists()
    {
        $this->assertEquals($this->request->getParams()['test'], 'testing');
    }
}

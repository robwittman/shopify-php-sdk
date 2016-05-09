<?php

namespace Shopify;

class RedirectTest extends TestCase
{
    public function testRedirectIndex()
    {
        $list = Redirect::all();
        $this->assertInstanceOf('\Shopify\Redirect', $list[0]);
    }

    public function testRedirectCount()
    {
        $count = Redirect::count();
        $this->assertInternalType("int", $count);
    }

    public function testRedirectGet()
    {
        $obj = Redirect::get(12341);
        $this->assertInstanceOf('\Shopify\Redirect', $obj);
    }

    public function testRedirectCreate()
    {
        $redirect = new Redirect([
            'path' => '/products.php',
            'target' => 'products'
        ]);
        $redirect->create();
        $this->assertNotNull($redirect->id);
    }

    public function testRedirectUpdate()
    {
        $redirect = Redirect::get(12341);
        $redirect->path = 'index.html';
        $redirect->update();
        $this->assertEquals($redirect->path, 'index.html');
    }

    public function testRedirectDelete()
    {
        (new Redirect([
            'id' => 123413
        ]))->delete();
    }
}

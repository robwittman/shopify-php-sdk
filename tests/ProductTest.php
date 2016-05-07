<?php

namespace Shopify;

class ProductTest extends TestCase
{
    public function testProductIndex()
    {
        $data = Product::all();

        $this->assertInstanceOf('\Shopify\Product', $data[0]);
    }

    public function testProductGet()
    {
        $data = Product::get(1324);

        $this->assertInstanceOf('\Shopify\Product', $data);
    }
}

<?php

namespace Shopify;

class ProductTest extends TestCase
{
    public function testProductIndex()
    {
        $data = Product::all();

        $this->assertInstanceOf('\Shopify\Product', $data[0]);
    }

    public function testProductCount()
    {
        $count = Product::count();
        $this->assertInternalType("int", $count);
    }

    public function testProductGet()
    {
        $data = Product::get(1324);

        $this->assertInstanceOf('\Shopify\Product', $data);
    }

    public function testProductUpdate()
    {
        $data = Product::get(12345);
        $data->title = 'Testing Title';
        $data->update();
        $this->assertEquals($data->title, "Testing Title");
    }

    public function testProductCreate()
    {
        $prod = new Product([
            'title' => 'Test'
        ]);
        $prod->create();
        $this->assertNotNull($prod->id);
    }

    public function testProductDelete()
    {
        (new Product([
            'id' => 12341234
        ]))->delete();
    }
}

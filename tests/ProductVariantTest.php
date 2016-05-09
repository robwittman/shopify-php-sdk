<?php

namespace Shopify;

class ProductVariantTest extends TestCase
{
    private $product_id = 1234;

    public function testProductVariantIndex()
    {
        $data = ProductVariant::all($this->product_id);

        $this->assertInstanceOf('\Shopify\ProductVariant', $data[0]);
    }

    public function testProductVariantGet()
    {
        $data = ProductVariant::get(1324, $this->product_id);

        $this->assertInstanceOf('\Shopify\ProductVariant', $data);
    }

    public function testProductVariantCount()
    {
        $count = ProductVariant::count(12341);
        $this->assertInternalType("int", $count);
    }

    public function testProductVariantCreate()
    {
        $var = new ProductVariant([
            'product_id' => 1234123,
            'title' => 'testing-handle'
        ]);
        $var->create();
        $this->assertNotNull($var->id);
    }

    public function testProductVariantUpdate()
    {
        $var= ProductVariant::get(12341,1234123);
        $var->title = 'New title';
        $var->update();
        $this->assertEquals($var->title, 'New title');
    }

    public function testProductVariantDelete()
    {
        (new ProductVariant([
            'product_id' => 12341234,
            'id' => 12341234
        ]))->delete();
    }
}

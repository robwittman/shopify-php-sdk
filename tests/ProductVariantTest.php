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
}

<?php

namespace Shopify;

class ProductImageTest extends TestCase
{
    public function testImagesIndex()
    {
        $images = ProductImage::all(1231);
        $this->assertInstanceOf('\Shopify\ProductImage', $images[0]);
    }

    public function testImagesCount()
    {
        $count = ProductImage::count(123412);
        $this->assertInternalType("int", $count);
    }

    public function testImagesGet()
    {
        $image = ProductImage::get(15123,1231);
        $this->assertInstanceOf('\Shopify\ProductImage', $image);
    }

    public function testImagesCreate()
    {
        $images = new ProductImage([
            'product_id' => 12341234,
            'src' => 'https://google.com'
        ]);
        $images->create();
        $this->assertNotNull($images->id);
    }

    public function testImagesUpdate()
    {
        $images = ProductImage::get(134,1234123);
        $images->src = 'https://google.com';
        $images->update();
        $this->assertEquals($images->src, 'https://google.com');
    }

    public function testImagesDelete()
    {
        (new ProductImage([
            'product_id' => 123412,
            'id' => 1234123
        ]))->delete();
    }
}

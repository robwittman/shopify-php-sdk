<?php

namespace Shopify;

class BlogTest extends TestCase
{
    public function testBloggIndex()
    {
        $data = Blog::all();
        $this->assertInstanceOf('\Shopify\Blog', $data[0]);
    }

    public function testBlogGet()
    {
        $data = Blog::get();

        $this->assertInstanceOf('\Shopify\Blog', $data);
    }
}

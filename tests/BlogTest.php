<?php

namespace Shopify;

class BlogTest extends TestCase
{
    public function testBlogIndex()
    {
        $data = Blog::all();
        $this->assertInstanceOf('\Shopify\Blog', $data[0]);
    }

    public function testBlogGet()
    {
        $data = Blog::get();

        $this->assertInstanceOf('\Shopify\Blog', $data);
    }

    public function testBlogGetArticles()
    {
        $data = Blog::get(413512);
        $articles = $data->getArticles();
        $this->assertInstanceOf('\Shopify\Article', $articles[0]);
    }

    public function testBlogCreate()
    {
        $data = new Blog([
            'handle' => 'blog-handle'
        ]);
        $data->create();
        $this->assertNotNull($data->id);
    }

    public function testBlogUpdate()
    {
        $data = new Blog(['id' => 1234]);
        $data->handle = 'testing_update';
        $data->update();
        $this->assertEquals($data->handle, 'testing_update');
    }
}

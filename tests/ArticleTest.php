<?php

namespace Shopify;

class ArticleTest extends TestCase
{
    private $blog_id = 12341234;

    public function testArticleIndex()
    {
        $data = Article::all($this->blog_id);
        $this->assertInstanceOf('\Shopify\Article', $data[0]);
    }

    public function testArticleGet()
    {
        $data = Article::get(1234, $this->blog_id);

        $this->assertInstanceOf('\Shopify\Article', $data);
    }
}

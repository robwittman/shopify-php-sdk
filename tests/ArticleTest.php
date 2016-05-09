<?php

namespace Shopify;

use Shopify\ArticleFields;
use Shopify\Exception;

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

    public function testArticleCreate()
    {
        $article = new Article([
            'author' => 'Article Author',
            'blog_id' => 12341234
        ]);
        $article->create();
        $this->assertNotNull($article->id);
    }

    public function testArticleUpdate()
    {
        $article = new Article([
            'author' => "Article author",
            'blog_id' => 12351235,
            'id' => 1235123
        ]);
        $article->update();
    }

    public function testArticleCount()
    {
        $count = Article::count(123412);
        $this->assertInternalType("int", $count);
    }

    public function testArticleGetAuthors()
    {
        $authors = Article::getAuthors();
        $this->assertInternalType("array", $authors);
    }

    public function testArticleGetAllTags()
    {
        $tags = Article::getTags();
        $this->assertInternalType("array", $tags);
    }

    public function testArticleGetAllTagsInBlog()
    {
        $tags = Article::getTagsFromBlog(12351);
        $this->assertInternalType("array", $tags);
    }

    public function testArticleDelete()
    {
        $article = Article::get(12341, 13241234);
        $article->delete();
    }
}

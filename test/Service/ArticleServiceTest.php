<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Service\ArticleService;
use Shopify\Object\Article;
use Shopify\Object\Author;

class ArticleServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/ArticlesList.json');
        $service = new ArticleService($api);
        $article = $service->all(1);
        $this->assertContainsOnlyInstancesOf(
            Article::class,
            $article
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/Article.json');
        $service = new ArticleService($api);
        $article = $service->get(1234, 4321);
        $this->assertInstanceOf(Article::class, $article);
    }

    public function testCreate()
    {
        $api = $this->getApiMock(array(
            'article' => array('id' => 1234)
        ));
        $service = new ArticleService($api);
        $article = new Article();
        $service->create(1234, $article);
        $this->assertEquals($article->id, 1234);
    }

    public function testUpdate()
    {
        $api = $this->getApiMock(array(
            'article' => array('title' => 'New Title')
        ));
        $service = new ArticleService($api);
        $article = new Article();
        $service->create(1234, $article);
        $this->assertEquals($article->title, 'New Title');
    }
}

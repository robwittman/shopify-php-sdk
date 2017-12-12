<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Object\Blog;
use Shopify\Service\BlogService;

class BlogServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/BlogsList.json');
        $service = new BlogService($api);
        $blogs = $service->all();
        $this->assertContainsOnlyInstancesOf(
            Blog::class,
            $blogs
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/Blog.json');
        $service = new BlogService($api);
        $blog = $service->get(1);
        $this->assertInstanceOf(Blog::class, $blog);
    }
}

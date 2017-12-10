<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Object\Page;
use Shopify\Service\PageService;

class PageServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/PagesList.json');
        $service = new PageService($api);
        $pages = $service->all();
        $this->assertContainsOnlyInstancesOf(
            Page::class,
            $pages
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/Page.json');
        $service = new PageService($api);
        $page = $service->get(1);
        $this->assertInstanceOf(Page::class, $page);
    }
}

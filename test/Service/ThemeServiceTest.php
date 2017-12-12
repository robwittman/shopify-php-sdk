<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Service\ThemeService;
use Shopify\Object\Theme;

class ThemeServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/ThemesList.json');
        $service = new ThemeService($api);
        $themes = $service->all();
        $this->assertContainsOnlyInstancesOf(
            Theme::class,
            $themes
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/Theme.json');
        $service = new ThemeService($api);
        $theme = $service->get(1234);
        $this->assertInstanceOf(Theme::class, $theme);
    }
}

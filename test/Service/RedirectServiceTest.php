<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Object\Redirect;
use Shopify\Service\RedirectService;

class RedirectServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/RedirectsList.json');
        $service = new RedirectService($api);
        $redirects = $service->all();
        $this->assertContainsOnlyInstancesOf(
            Redirect::class,
            $redirects
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/Redirect.json');
        $service = new RedirectService($api);
        $redirect = $service->get(1);
        $this->assertInstanceOf(Redirect::class, $redirect);
    }
}

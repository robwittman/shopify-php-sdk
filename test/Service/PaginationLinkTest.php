<?php

namespace Shopify\Test\Service;

use Shopify\Object\PaginationLink;
use Shopify\Service\CustomerService;
use Shopify\Test\TestCase;

class PaginationLinkTest extends TestCase
{
    public function testGetPaginationLink()
    {
        $previous = 'https://demo.myshopify.com/admin/api/2021-01/customers.json?limit=5&page_info=xyzprevious';
        $next = 'https://demo.myshopify.com/admin/api/2021-01/customers.json?limit=5&page_info=xyznext';

        // test previous && next
        $api = $this->getApiMock(
            ['customers' => ['unit test']],
            ['Link' => '<' . $previous . '>; rel="previous", <' . $next . '>; rel="next"']
        );

        $service = new CustomerService($api);
        $service->all();
        $res = $service->getPaginationLink();
        $this->assertInstanceOf(PaginationLink::class, $res);
        $this->assertTrue($res->next == $next);
        $this->assertTrue($res->previous == $previous);

        // test only next
        $api = $this->getApiMock(
            ['customers' => ['unit test']],
            ['Link' => '<' . $next . '>; rel="next"']
        );

        $service = new CustomerService($api);
        $service->all();
        $res = $service->getPaginationLink();
        $this->assertInstanceOf(PaginationLink::class, $res);
        $this->assertTrue($res->next == $next);
    }
}

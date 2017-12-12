<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Object\Customer;
use Shopify\Service\CustomerService;

class CustomerServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/CustomersList.json');
        $service = new CustomerService($api);
        $customers = $service->all();
        $this->assertContainsOnlyInstancesOf(
            Customer::class,
            $customers
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/Customer.json');
        $service = new CustomerService($api);
        $customer = $service->get(1);
        $this->assertInstanceOf(Customer::class, $customer);
    }
}

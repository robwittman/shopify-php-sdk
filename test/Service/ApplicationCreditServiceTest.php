<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Service\ApplicationCreditService;
use Shopify\Object\ApplicationCredit;

class ApplicationCreditServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/ApplicationCreditList.json');
        $service = new ApplicationCreditService($api);
        $credit = $service->all();
        $this->assertContainsOnlyInstancesOf(
            ApplicationCredit::class,
            $credit
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/ApplicationCredit.json');
        $service = new ApplicationCreditService($api);
        $credit = $service->get(1234);
        $this->assertInstanceOf(ApplicationCredit::class, $credit);
    }

    public function testCreate()
    {
        $api = $this->getApiMock(array(
            'application_credit' => array('id' => 1234)
        ));
        $service = new ApplicationCreditService($api);
        $credit = new ApplicationCredit();
        $service->create($credit);
        $this->assertEquals($credit->id, 1234);
    }
}

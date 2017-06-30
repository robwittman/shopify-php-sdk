<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Service\ApplicationChargeService;
use Shopify\Object\ApplicationCharge;

class ApplicationChargeServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/ApplicationChargeList.json');
        $service = new ApplicationChargeService($api);
        $charge = $service->all();
        $this->assertContainsOnlyInstancesOf(
            ApplicationCharge::class,
            $charge
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/ApplicationCharge.json');
        $service = new ApplicationChargeService($api);
        $charge = $service->get(1234);
        $this->assertInstanceOf(ApplicationCharge::class, $charge);
    }

    public function testActivate()
    {
        $api = $this->getApiMock(array(
            'application_charge' => array('status' => 'active')
        ));
        $service = new ApplicationChargeService($api);
        $charge = new ApplicationCharge(array(
            'id' => 1234
        ));
        $service->activate($charge);
        $this->assertEquals($charge->getStatus(), 'active');
    }

    public function testCreate()
    {
        $api = $this->getApiMock(array(
            'application_charge' => array('id' => 1234)
        ));
        $service = new ApplicationChargeService($api);
        $charge = new ApplicationCharge();
        $service->create($charge);
        $this->assertEquals($charge->getId(), 1234);
    }
}

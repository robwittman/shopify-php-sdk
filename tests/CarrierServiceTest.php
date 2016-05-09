<?php

namespace Shopify;

class CarrierServiceTest extends TestCase
{
    public function testCreateCarrierService()
    {
        $carrier_service = new CarrierService([
            'active' => true,
            'callback_url' => 'http://domain.com/callback/url',
            'carrier_service_type' => 'api'
        ]);
        $carrier_service->create();
        $this->assertNotNull($carrier_service->id);
    }

    public function testListCarrierServices()
    {
        $carrier_services = CarrierService::all();
        $this->assertInstanceOf('\Shopify\CarrierService', $carrier_services[0]);
    }

    public function testGetchCarrierService()
    {
        $carrier_service = CarrierService::get(123413);
        $this->assertInstanceOf('\Shopify\CarrierService', $carrier_service);
    }

    public function testUpdateCarrierService()
    {
        $carrier_service = CarrierService::get(1234123);
        $carrier_service->name = "New carrier service name";
        $carrier_service->update();
        $this->assertEquals($carrier_service->name, 'New carrier service name');
    }

    public function testDeleteCarrierService()
    {
        (new CarrierService([
            'id' => 1234123
        ]))->delete();
    }
}

<?php

namespace Shopify;

class CountryTest extends TestCase
{
    public function testCountryIndex()
    {
        $countries = Country::all();
        $this->assertInstanceOf('\Shopify\Country', $countries[0]);
    }

    public function testCountryGet()
    {
        $country = Country::get(12341);
        $this->assertInstanceOf('\Shopify\Country', $country);
    }

    public function testCountryCount()
    {
        $count = Country::count();
        $this->assertInternalType("int", $count);
    }

    public function testCountryCreate()
    {
        $country = new Country([
            'code' => "US"
        ]);
        $country->create();
        $this->assertNotNull($country->id);
    }

    public function testCountryUpdate()
    {
        $country = Country::get(1234);
        $country->code = "US";
        $country->update();
        $this->assertEquals($country->code, "US");
    }

    public function testCountryDelete()
    {
        $country = Country::get(12341);
        $country->delete();
    }
}

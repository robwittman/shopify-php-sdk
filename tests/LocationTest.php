<?php

namespace Shopify;

class LocationTest extends TestCase
{
    public function testLocationIndex()
    {
        $locations = Location::all();
        $this->assertInstanceOf('\Shopify\Location', $locations[0]);
    }

    public function testLocationGet()
    {
        $location = Location::get(1234);
        $this->assertInstanceOf('\Shopify\Location', $location);
    }
}

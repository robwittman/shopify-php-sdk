<?php

namespace Shopify;

class CustomerAddressTest extends TestCase
{
    public function testListCustomerAddresses()
    {

    }

    public function testGetCustomerAddress()
    {

    }

    public function testCreateCustomerAddress()
    {

    }

    public function testUpdateCustomerAddress()
    {

    }

    public function testDeleteCustomerAddress()
    {

    }

    public function testSetAddressAsDefaultForCustomer()
    {
        $address = CustomerAddress::get(41234,1234123);
        $this->assertTrue($address->setAsDefault());
    }
}

<?php

namespace Shopify;

class CustomerTest extends TestCase
{
    public function testCustomerIndex()
    {
        $customers = Customer::all();
        $this->assertInstanceOf('\Shopify\Customer', $customers[0]);
    }

    public function testCustomerGet()
    {
        $customer = Customer::get(12341);
        $this->assertInstanceOf('\Shopify\Customer', $customer);
    }

    public function testCustomerCreate()
    {
        $customer = new Customer([
            'accepts_marketing' => true,
            'email' => "test_email@domain.com"
        ]);
        $customer->create();
        $this->assertNotNull($customer->id);
    }

    public function testCustomerUpdate()
    {
        $customer = Customer::get(123412);
        $customer->email = 'new_email@domain.com';
        $customer->update();
        $this->assertEquals($customer->email, 'new_email@domain.com');
    }

    public function testCustomerCreateActivationURL()
    {
        $activation_url = (new Customer(['id' => 1234123]))->createAccountActivationURL();
        $this->assertInternalType('string', $activation_url);
    }

    public function testCustomerCount()
    {
        $count = Customer::count();
        $this->assertInternalType("int", $count);
    }

    public function testCustomerDelete()
    {
        $customer = Customer::get(12341);
        $customer->delete();
    }

    public function testCustomerGetOrders()
    {
        $orders = (new Customer([
            'id' => 1234123
        ]))->getOrders();
        $this->assertInstanceOf('\Shopify\Order', $orders[0]);
    }

    public function testGetAddresses()
    {
        $customer = Customer::get(1234123);
        $addresses = $customer->getAddresses();
        $this->assertInstanceOf('\Shopify\CustomerAddress', $addresses[0]);
    }
}

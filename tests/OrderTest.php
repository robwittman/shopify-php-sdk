<?php

namespace Shopify;

class OrderTest extends TestCase
{
    private $order;

    public function testOrdersIndex()
    {
        $orders = Order::all();
        $this->assertInstanceOf('\Shopify\Order', $orders[0]);
    }

    public function testOrderGet()
    {
        $this->order = Order::get(1234);
        $this->assertInstanceOf('\Shopify\Order', $this->order);
    }

    public function testOrdersCount()
    {
        $count = Order::count();
        $this->assertInternalType("int", $count);
    }

    public function testOrdersClose()
    {
        $order = Order::get(1341234);
        $this->assertTrue($order->close());
    }

    public function testOrdersOpen()
    {
        $order = Order::get(1341234);
        $this->assertTrue($order->open());
    }

    public function testOrdersCancel()
    {
        $order = Order::get(1341234);
        $this->assertTrue($order->cancel());
    }

    public function testOrdersCreate()
    {
        $order = new Order([
            'email' => 'testemail@domain.com',
            'fulfillment_status' => 'fulfilled',
            'send_receipt' => true,
        ]);
        $order->create();
        $this->assertNotNull($order->id);
    }

    public function testOrdersUpdate()
    {
        $order = new Order([
            'id' => 12341234,
            'email' => 'updated_email@domain.com'
        ]);
        $order->update();
        $this->assertEquals($order->email, 'updated_email@domain.com');
    }
    public function testOrdersDelete()
    {
        (new Order([
            'id' => 1234123
        ]))->delete();
    }

    public function testOrdersGetFulfillments()
    {
        $order = Order::get(1234123);
        $fulfillments = $order->getFulfillments();
        $this->assertInstanceOf('\Shopify\Fulfillment', $fulfillments[0]);
    }

    public function testOrderGetTransactions()
    {
        $order = Order::get(123412);
        $transactions = $order->getTransactions();
        $this->assertInstanceOf('\Shopify\Transaction', $transactions[0]);
    }

    public function testOrderGetCustomer()
    {
        $order = Order::get(1234123);
        $customer = $order->getCustomer();
        $this->assertInstanceOf('\Shopify\Customer', $customer);
    }

    /**
     * @depends testOrderGet
     */
    public function testFulfillmentInstance()
    {
        $this->order = Order::get(1234);
        $this->assertInstanceOf('\Shopify\Fulfillment', $this->order->fulfillments[0]);
    }
}

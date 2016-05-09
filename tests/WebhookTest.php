<?php

namespace Shopify;

class WebhookTest extends TestCase
{
    public function testListWebhooks()
    {
        $webhooks = Webhook::all();
        $this->assertInstanceOf('\Shopify\Webhook', $webhooks[0]);
    }

    public function testCountWebhooks()
    {
        $count = Webhook::count();
        $this->assertInternalType("int", $count);
    }

    public function testFetchWebhook()
    {
        $webhook = Webhook::get(1234);
        $this->assertInstanceOf('\Shopify\Webhook', $webhook);
    }

    public function testCreateWebhook()
    {
        $webhook = new Webhook([
            'topic' => 'products/create',
            'address' => 'http://hostname.com/webhook/path',
            'format' => 'json'
        ]);
        $webhook->create();
        $this->assertNotNull($webhook->id);
    }

    public function testUpdateWebhook()
    {
        $webhook = Webhook::get(123412);
        $webhook->address = 'http://newdomain.com';
        $webhook->update();
        $this->assertEquals($webhook->address, 'http://newdomain.com');
    }

    public function testDeleteWebhook()
    {
        $webhook = Webhook::get(1234123);
        $webhook->delete();
    }
}

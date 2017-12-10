<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Service\WebhookService;
use Shopify\Object\Webhook;

class WebhookServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/WebhooksList.json');
        $service = new WebhookService($api);
        $webhooks = $service->all();
        $this->assertContainsOnlyInstancesOf(
            Webhook::class,
            $webhooks
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/Webhook.json');
        $service = new WebhookService($api);
        $webhook = $service->get(1234);
        $this->assertInstanceOf(Webhook::class, $webhook);
    }
}

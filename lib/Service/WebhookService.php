<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Webhook;

class WebhookService extends AbstractService
{
    public static $className = Webhook::class;
    
    public static $endpoint = 'webhooks';
}

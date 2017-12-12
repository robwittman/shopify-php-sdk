<?php

namespace Shopify\Test;

use Shopify\AbstractApi;
use Psr\Log\LoggerInterface;
use GuzzleHttp\Client;

class AbstractApiTest extends TestCase
{
    public function testConstruct()
    {
        $api = new TestableAbstractApi(array(
            'myshopify_domain' => 'test-domain.myshopify.com'
        ));
        $this->assertEquals($api->getMyshopifyDomain(), 'test-domain.myshopify.com');
    }
}

class TestableAbstractApi extends AbstractApi
{
    public function init() {

    }
}

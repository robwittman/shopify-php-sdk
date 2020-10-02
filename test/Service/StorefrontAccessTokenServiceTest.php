<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Service\StorefrontAccessTokenService;
use Shopify\Object\StorefrontAccessToken;

class StorefrontAccessTokenServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/StorefrontAccessTokensList.json');
        $service = new StorefrontAccessTokenService($api);
        $tokens = $service->all();
        $this->assertContainsOnlyInstancesOf(
            StorefrontAccessToken::class,
            $tokens
        );
    }

    public function _testCreate()
    {
        $api = $this->getApiMock('objects/StorefrontAccessToken.json');
        $service = new StorefrontAccessTokenService($api);

        $token = new StorefrontAccessToken();
        $token->setData(['title' => 'Test']);
        $results = $service->create($token);
        $this->assertInstanceOf(StorefrontAccessToken::class, $results);
    }
}

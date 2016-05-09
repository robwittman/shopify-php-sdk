<?php

namespace Shopify;

class AcccessTokenTest extends TestCase
{
    protected static $access_token;

    public static function setUpBeforeClass()
    {
        self::$access_token = new AccessToken((object)[
            'access_token' => 'asdfaposdjfoas',
            'scope' => 'read_products'
        ]);
    }

    public function testAccessTokenTokenField()
    {
        $this->assertEquals(self::$access_token->getToken(), 'asdfaposdjfoas');
    }

    public function testAccessTokenScopeField()
    {
        $this->assertEquals(self::$access_token->scopes(), 'read_products');
    }
}

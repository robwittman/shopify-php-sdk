<?php

namespace Shopify;

class AbandonedCheckoutTest extends TestCase
{
    public function testAbandonedCheckoutIndex()
    {
        $checkouts = AbandonedCheckout::all();
        $this->assertInstanceOf('\Shopify\AbandonedCheckout', $checkouts[0]);
    }
}

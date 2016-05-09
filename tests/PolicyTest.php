<?php

namespace Shopify;

class PolicyTest extends TestCase
{
    public function testPoliciesIndex()
    {
        $list = Policy::all();
        $this->assertInstanceOf('\Shopify\Policy', $list[0]);
    }
}

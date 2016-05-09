<?php

namespace Shopify;

class DiscountTest extends TestCase
{
    public function testDiscountCreate()
    {
        $discount = new Discount([
            'discount_type' => 'percentage',
        ]);
        $discount->create();
        $this->assertNotNull($discount->id);
    }

    public function testDiscountIndex()
    {
        $discounts = Discount::all();
        $this->assertInstanceOf('\Shopify\Discount', $discounts[0]);
    }

    public function testDiscountGet()
    {
        $discount = Discount::get(12341);
        $this->assertInstanceOf('\Shopify\Discount', $discount);
    }

    public function testDiscountEnable()
    {
        $discount = Discount::get(12341);
        $this->assertTrue($discount->enable());
    }

    public function testDiscountDisable()
    {
        $discount = Discount::get(12341);
        $this->assertTrue($discount->disable());
    }

    public function testDiscountDelete()
    {
        $discount = (new Discount(['id' => 12341]))->delete();
    }

    /**
     * @expectedException \Shopify\Exception\ApiException
     */
    public function testDiscountUpdate()
    {
        $discount = Discount::get(12341);
        $discount->discount_type = 'percentage';
        $discount->update();
    }
}

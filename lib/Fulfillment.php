<?php

namespace Shopify

class Fulfillment extends AbstractChildObject
{
    protected static $parentUrl = 'orders';
    protected static $parentIdField = 'order_id';
    protected static $classUrl = 'fulfillments';
    protected static $handle = 'fulfillment';

    public function complete()
    {

    }

    public function open()
    {

    }

    public function cancel()
    {
        
    }
}

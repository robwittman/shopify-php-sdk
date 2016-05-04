<?php

namespace Shopify;

use Shopify\Util;

class Order extends AbstractObject
{
    protected static $handle = 'order';
    protected static $classUrl = 'orders';

    public function __construct($data)
    {
        parent::__construct($data);
        $fulfillments = array();
        $this->customer = new \Shopify\Customer($this->customer);

        if(isset($data->fulfillments))
        {
            foreach($data->fulfillments as $fulfillment) array_push($fulfillments, new \Shopify\Fulfillment($fulfillment));
            $this->fulfillments = $fulfillments;
        }
    }
}

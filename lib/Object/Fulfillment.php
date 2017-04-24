<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Fulfillment extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $line_items;
    protected $notify_customer;
    protected $order_id;
    protected $receipt;
    protected $status;
    protected $tracking_company;
    protected $tracking_numbers;
    protected $tracking_urls;
    protected $variant_inventory_management;
}

<?php

namespace Shopify\Object;

use Shopify\Concerns\HasId;

class Discount extends AbstractObject
{
    use HasId;

    protected $discount_type;
    protected $code;
    protected $value;
    protected $ends_at;
    protected $starts_at;
    protected $status;
    protected $minimum_order_amount;
    protected $usage_limit;
    protected $applies_to_id;
    protected $applies_once;
    protected $applies_once_per_customer;
    protected $applies_to_resource;
    protected $times_used;
}

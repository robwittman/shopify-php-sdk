<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class FulfillmentEvent extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $shop_id;
    protected $order_id;
    protected $fulfillment_id;
    protected $status;
    protected $happened_at;
    protected $message;
    protected $city;
    protected $province;
    protected $zip;
    protected $country;
    protected $address1;
    protected $latitude;
    protected $longitude;
}

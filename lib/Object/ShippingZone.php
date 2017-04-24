<?php

namespace Shopify\Object;

use Shopify\Concerns\HasId;

class ShippingZone extends AbstractObject
{
    use HasTimestamps;

    protected $name;
    protected $countries;
    protected $provinces;
    protected $carrier_shipping_rate_providers;
    protected $price_based_shipping_rates;
    protected $weight_based_shipping_rates;
}

<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class UsageCharge extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $description;
    protected $price;
    protected $recurring_appliction_charge_id;
}

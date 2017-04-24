<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class RecurringApplicationCharge extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $activated_on;
    protected $billing_on;
    protected $cancelled_on;
    protected $capped_amount;
    protected $confirmation_url;
    protected $name;
    protected $price;
    protected $return_url;
    protected $status;
    protected $terms;
    protected $test;
    protected $trial_days;
    protected $trial_ends_on;
}

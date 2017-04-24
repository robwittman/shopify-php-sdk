<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Transaction extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $amount;
    protected $authorization;
    protected $device_id;
    protected $gateway;
    protected $source_name;
    protected $payment_details;
    protected $kind;
    protected $order_id;
    protected $receipt;
    protected $error_code;
    protected $status;
    protected $test;
    protected $user_id;
    protected $currency;
}

<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Customer extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $accepts_marketing;
    protected $addresses;
    protected $default_address;
    protected $email;
    protected $phone;
    protected $first_name;
    protected $metafield;
    protected $multipass_identifier;
    protected $last_name;
    protected $last_order_id;
    protected $last_order_name;
    protected $note;
    protected $orders_count;
    protected $state;
    protected $tax_exempt;
    protected $total_spent;
    protected $verified_email;
}

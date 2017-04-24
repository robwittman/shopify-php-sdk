<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Location extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $name;
    protected $address1;
    protected $address2;
    protected $zip;
    protected $city;
    protected $province;
    protected $country;
    protected $phone;
}

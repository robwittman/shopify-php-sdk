<?php

namespace Shopify\Object;

use Shopify\Concerns\HasId;

class Province extends AbstractObject
{
    protected $code;

    protected $country_id;

    protected $name;

    protected $shipping_zone_id;

    protected $tax;

    protected $tax_name;

    protected $tax_type;

    protected $tax_percentage;
}

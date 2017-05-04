<?php

namespace Shopify\Object;

class ShippingLine extends AbstractObject
{
    protected $code;
    protected $price;
    protected $source;
    protected $title;
    protected $tax_lines;
    protected $carrier_identifier;
    protected $requested_fulfillment_service;
}

<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\ShippingZone;

class ShippingZoneService extends AbstractService
{
    /**
     * Return a list of shipping zones
     * @link https://help.shopify.com/api/reference/shipping_zone#index
     * @return ShippingZone[]
     */
    public function all()
    {

    }
}

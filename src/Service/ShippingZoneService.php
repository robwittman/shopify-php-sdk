<?php

namespace Shopify\Service;

use Shopify\Object\ShippingZone;
use Shopify\Exception\ShopifySdkException;

class ShippingZoneService extends AbstractService
{
    /**
     * Return a list of shipping zones
     *
     * @link   https://help.shopify.com/api/reference/shipping_zone#index
     * @throws ShopifySdkException
     */
    public function all()
    {
        throw new ShopifySdkException("ShippingZoneService not implemented");
    }
}

<?php

namespace Shopify\Service;

use Shopify\Object\Shop;

class ShopService extends AbstractService
{
    /**
     * Receive a single shop
     *
     * @link   https://help.shopify.com/api/reference/shop#show
     * @return Shop
     */
    public function get()
    {
        $request = $this->createRequest('/admin/shop.json');
        $response = $this->send($request);
        return $this->createObject(Shop::class, $response['shop']);
    }
}

<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Shop;

class ShopService extends AbstractService
{
    public function get()
    {
        $request = new Request('GET', '/admin/shop.json');
        $response = $this->send($request);
        return $this->createObject(Shop::class, $response->shop);
    }

    public function update(Shop $shop)
    {
        $id = $shop->getId();
        $data = $shop->exportData();
        $request = new Request('PUT', '/admin/shop.json');
        $response = $this->send($request, array(
            'shop' => $data
        ));
        return true;
    }
}

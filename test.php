<?php

require_once 'vendor/autoload.php';

$api = new \Shopify\PrivateApi();
$api->setApiKey('427a3f8f0cb5b3b443bc7157aa6bcd1e')
    ->setPassword('befc75058d4cd38f7df70564226319e5')
    ->setSharedSecret('1e24595070331c15799c34e791941276')
    ->setMyshopifyDomain('piper-lou-collection.myshopify.com');
// $service = new \Shopify\Service\ShopService($api);
//
// $shop = $service->get();

//
// $service = new \Shopify\Service\ProductService($api);
// $products = $service->all();
// var_dump($products);
// // var_dump($products);

// $service = new \Shopify\Service\ShopService($api);
// $shop = $service->get();
// var_dump($shop);

// error_log($shop->getAddress1());
// $service = new \Shopify\Service\CustomCollectionService($api);
// $custom_collections = $service->all();
// var_dump($custom_collections);
//
// $service = new \Shopify\Service\ProductService($api);
// $options = new \Shopify\Options\Product\ListOptions();
// $options->setLimit(10);
// $products = $service->all($options);
// var_dump($products);
$service = $api->getService('Country');
// $service = new \Shopify\Service\CountryService($api);
$countries = $service->all();
var_dump($countries);

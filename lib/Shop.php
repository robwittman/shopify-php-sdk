<?php

/**
 * Shop object
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/shop
 */

namespace Shopify;

class Shop extends AbstractResource
{
    /**
     * Endpoint for this resource
     * @var string
     */
    protected static $classUrl = 'shop';

    /**
     * API response handle
     * @var string
     */
    protected static $classHandle = 'shop';

    /**
     * This is overridden since the shop is a singleton
     * object in Shopify's domain.
     *
     * @return self
     */
    public static function get()
    {
        $resp = self::call(self::$classUrl, 'GET');
        return Util\ObjectSet::createObjectFromJson($resp);
    }

    public function update()
    {
        throw new Exception\ApiException("API SDK cannot be used to update a shop resource");
    }

    public function create()
    {
        throw new Exception\ApiException("API SDK cannot be used to create a shop resource");
    }

    public static function all()
    {
        throw new Exception\ApiException("API SDK can only fetch authenticated shop resource");
    }

    public function delete()
    {
        throw new Exception\ApiException("API SDK cannot be used to delete a shop resource");
    }

    public function getCheckouts($params = array())
    {
        $checkouts = self::call('checkouts', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($checkouts);
    }

    public function getApplicationCharges($params = array())
    {
        $application_charges = self::call('application_charges', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($application_charges);
    }

    public function getBlogs($params = array())
    {
        $blogs = self::call('blogs', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($blogs);
    }

    public function getCustomCollections($params = array())
    {
        $custom_collections = self::call('custom_collections', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($custom_collections);
    }

    public function getCustomers($params = array())
    {
        $customers = self::call('customers', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($customers);
    }

    public function getDiscounts($params = array())
    {
        $discounts = self::call('discounts', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($discounts);
    }

    public function getEvents($params = array())
    {
        $events = self::call('events', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($events);
    }

    public function getGiftCards($params = array())
    {
        $gift_cards = self::call('gift_cards', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($gift_cards);
    }

    public function getMetafields($params = array())
    {
        $metafields = self::call('metafields', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($metafields);
    }

    public function getOrders($params = array())
    {
        $orders = self::call('orders', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($orders);
    }

    public function getPages($params = array())
    {
        $pages = self::call('pages', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($pages);
    }

    public function getProducts($params = array())
    {
        $products = self::call('products', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($products);
    }

    public function getRecurringApplicationCharges($params = array())
    {
        $recurring_application_charges = self::call('recurring_application_charges', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($recurring_application_charges);
    }

    public function getRedirects($params = array())
    {
        $redirects = self::call('redirects', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($redirects);
    }

    public function getScriptTags($params = array())
    {
        $script_tags = self::call('script_tags', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($script_tags);
    }

    public function getSmartCollections($params = array())
    {
        $smart_collections = self::call('smart_collections', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($smart_collections);
    }

    public function getThemes($params = array())
    {
        $themes = self::call('themes', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($themes);
    }

    public function getUsers($params = array())
    {
        $users = self::call('users', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($users);
    }

    public function getWebhooks($params = array())
    {
        $webhooks = self::call('webhooks', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($webhooks);
    }
}

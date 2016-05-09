<?php

namespace Shopify;

class ShopTest extends TestCase
{
    public function testShopGet()
    {
        $shop = Shop::get();
        $this->assertInstanceOf('\Shopify\Shop', $shop);
    }

    /**
     * @expectedException \Shopify\Exception\ApiException
     */
    public function testUpdate()
    {
        $shop = Shop::get();
        $shop->name = 'Test';
        $shop->update();
    }

    /**
     * @expectedException \Shopify\Exception\ApiException
     */
    public function testCreate()
    {
        $shop = new Shop([
            'name' => 'something',
            'store_name' => 'something_else'
        ]);
        $shop->create();
    }

    /**
     * @expectedException \Shopify\Exception\ApiException
     */
    public function testDelete()
    {
        $shop = Shop::get();
        $shop->delete();
    }

    public function testShopGetCheckouts($params = array())
    {
        $shop = Shop::get();
        $checkouts = $shop->getCheckouts();
        $this->assertInstanceOf('\Shopify\AbandonedCheckout', $checkouts[0]);
    }

    public function testShopGetApplicationCharges($params = array())
    {
        $shop = Shop::get();
        $application_charges = $shop->getApplicationCharges();
        $this->assertInstanceOf('\Shopify\ApplicationCharge', $application_charges[0]);
    }

    public function testShopGetBlogs($params = array())
    {
        $shop = Shop::get();
        $blogs = $shop->getBlogs();
        $this->assertInstanceOf('\Shopify\Blog', $blogs[0]);
    }

    public function testShopGetCustomCollections($params = array())
    {
        $shop = Shop::get();
        $custom_collections = $shop->getCustomCollections();
        $this->assertInstanceOf('\Shopify\CustomCollection', $custom_collections[0]);
    }

    public function testShopGetCustomers($params = array())
    {
        $shop = Shop::get();
        $customers = $shop->getCustomers();
        $this->assertInstanceOf('\Shopify\Customer', $customers[0]);
    }

    public function testShopGetDiscounts($params = array())
    {
        $shop = Shop::get();
        $discounts = $shop->getDiscounts();
        $this->assertInstanceOf('\Shopify\Discount', $discounts[0]);
    }

    public function testShopGetEvents($params = array())
    {
        $shop = Shop::get();
        $events = $shop->getEvents();
        $this->assertInstanceOf('\Shopify\Event', $events[0]);
    }

    public function testShopGetGiftCards($params = array())
    {
        $shop = Shop::get();
        $gift_cards = $shop->getGiftCards();
        $this->assertInstanceOf('\Shopify\GiftCard', $gift_cards[0]);
    }

    public function testShopGetMetafields($params = array())
    {
        $shop = Shop::get();
        $metafields = $shop->getMetafields();
        $this->assertInstanceOf('\Shopify\Metafield', $metafields[0]);
    }

    public function testShopGetOrders($params = array())
    {
        $shop = Shop::get();
        $orders = $shop->getOrders();
        $this->assertInstanceOf('\Shopify\Order', $orders[0]);
    }

    public function testShopGetPages($params = array())
    {
        $shop = Shop::get();
        $pages = $shop->getPages();
        $this->assertInstanceOf('\Shopify\Page', $pages[0]);
    }

    public function testShopGetProducts($params = array())
    {
        $shop = Shop::get();
        $products = $shop->getProducts();
        $this->assertInstanceOf('\Shopify\Product', $products[0]);
    }

    public function testShopGetRecurringApplicationCharges($params = array())
    {
        $shop = Shop::get();
        $recurring_application_charges = $shop->getRecurringApplicationCharges();
        $this->assertInstanceOf('\Shopify\RecurringApplicationCharge', $recurring_application_charges[0]);
    }

    public function testShopGetRedirects($params = array())
    {
        $shop = Shop::get();
        $redirects = $shop->getRedirects();
        $this->assertInstanceOf('\Shopify\Redirect', $redirects[0]);
    }

    public function testShopGetScriptTags($params = array())
    {
        $shop = Shop::get();
        $script_tags = $shop->getScriptTags();
        $this->assertInstanceOf('\Shopify\ScriptTag', $script_tags[0]);
    }

    public function testShopGetSmartCollections($params = array())
    {
        $shop = Shop::get();
        $smart_collections = $shop->getSmartCollections();
        $this->assertInstanceOf('\Shopify\SmartCollection', $smart_collections[0]);
    }

    public function testShopGetThemes($params = array())
    {
        $shop = Shop::get();
        $themes = $shop->getThemes();
        $this->assertInstanceOf('\Shopify\Theme', $themes[0]);
    }

    public function testShopGetUsers($params = array())
    {
        $shop = Shop::get();
        $users = $shop->getUsers();
        $this->assertInstanceOf('\Shopify\User', $users[0]);
    }

    public function testShopiGetWebhooks($params = array())
    {
        $shop = Shop::get();
        $webhooks = $shop->getWebhooks();
        $this->assertInstanceOf('\Shopify\Webhook', $webhooks[0]);
    }
}

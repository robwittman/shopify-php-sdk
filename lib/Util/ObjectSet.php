<?php

/**
 * lib/Util/ObjectSet
 *
 * Creates objects based on Shopifys API response
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 */
namespace Shopify\Util;

class ObjectSet
{
    /**
     * Create objects based on our API response
     *
     * @param  mixed $resp JSON API response
     * @param  array  $opts
     * @return mixed
     */
    public static function createObjectFromJson($resp, $opts = array())
    {
        // This is an array of handles, and which Shopify object they ought to map to
        $types = array(
            'access_token'                          => '\\Shopify\\AccessToken',
            'application_charge'                    => '\\Shopify\\ApplicationCharge',
            'article'                               => '\\Shopify\\Article',
            'blog'                                  => '\\Shopify\\Blog',
            'carrier_service'                       => '\\Shopify\\CarrierService',
            'checkout'                              => '\\Shopify\\AbandonedCheckout',
            'checkouts'                             => '\\Shopify\\AbandonedCheckout',
            'collect'                               => '\\Shopify\\Collect',
            'comment'                               => '\\Shopify\\Comment',
            'country'                               => '\\Shopify\\Country',
            'countries'                             => '\\Shopify\\Country',
            'custom_collection'                     => '\\Shopify\\CustomCollection',
            'customer'                              => '\\Shopify\\Customer',
            'customer_address'                      => '\\Shopify\\CustomerAddress',
            'address'                               => '\\Shopify\\CustomerAddress',
            'customer_saved_search'                 => '\\Shopify\\CustomerSavedSearch',
            'discount'                              => '\\Shopify\\Discount',
            'event'                                 => '\\Shopify\\Event',
            'fulfillment'                           => '\\Shopify\\Fulfillment',
            'fulfillment_event'                     => '\\Shopify\\FulfillmentEvent',
            'fulfillment_service'                   => '\\Shopify\\FulfillmentService',
            'gift_card'                             => '\\Shopify\\GiftCard',
            'image'                                 => '\\Shopify\\ProductImage',
            'location'                              => '\\Shopify\\Location',
            'metafield'                             => '\\Shopify\\Metafield',
            'multipass'                             => '\\Shopify\\Multipass',
            'order'                                 => '\\Shopify\\Order',
            'order_risks'                           => '\\Shopify\\OrderRisks',
            'page'                                  => '\\Shopify\\Page',
            'product'                               => '\\Shopify\\Product',
            'province'                              => '\\Shopify\\Province',
            'recurring_application_charge'          => '\\Shopify\\RecurringApplicationCharge',
            'redirect'                              => '\\Shopify\\Redirect',
            'refund'                                => '\\Shopify\\Refund',
            'script_tag'                            => '\\Shopify\\ScriptTag',
            'shipping_zone'                         => '\\Shopify\\ShippingZone',
            'shop'                                  => '\\Shopify\\Shop',
            'smart_collection'                      => '\\Shopify\\SmartCollection',
            'theme'                                 => '\\Shopify\\Theme',
            'transaction'                           => '\\Shopify\\Transaction',
            'usage_charge'                          => '\\Shopify\\UsageCharge',
            'user'                                  => '\\Shopify\\User',
            'variant'                               => '\\Shopify\\ProductVariant',
            'webhook'                               => '\\Shopify\\Webhook',
        );

        // Find out which class we're working with based on the key of response
        $handle = key((array) $resp);
        // If count was requested, we can just return the value
        if($handle == 'count')
        {
            return $resp->{$handle};
        }

        // We have to handle special cases for handles that pluralize differently
        if($handle == 'countries')
        {
            $key = 'country';
        }
        // Default, we just trim the 's' to get the handle
        else $key = rtrim($handle, 's');

        if(!array_key_exists($key, $types))
        {
            return $resp;
        }
        $class = $types[$key];
        // Check if our result set is an array, or a single object
        if(self::isList($resp, $handle))
        {
            // Fill the array with created objects, and return
            $mapped = array();
            foreach($resp->{$handle} as $item)
            {
                array_push($mapped, $class::createFromJson($item, $opts));
            }
            return $mapped;
        } else {
            // Instantiate a single object, and return it
            return $class::createFromJson($resp->{$key}, $opts);
        }
    }

    /**
     * Check if our data is a single object, or set of objects
     * @param  mixed  $data
     * @param  string  $handle
     * @return boolean
     */
    public static function isList($data, $handle)
    {
        if(is_array($data->{$handle}))
        {
            return TRUE;
        }
        return FALSE;
    }
}

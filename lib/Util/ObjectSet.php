<?php

namespace Shopify\Util;

class ObjectSet
{
    public static function createObjectFromJson($resp, $opts = array())
    {
        $types = array(
            'access_token'                          => '\\Shopify\\AccessToken',
            'application_charge'                    => '\\Shopify\\ApplicationCharge',
            'article'                               => '\\Shopify\\Article',
            'blog'                                  => '\\Shopify\\Blog',
            'carrier_service'                       => '\\Shopify\\CarrierService',
            'checkout'                              => '\\Shopify\\AbandonedCheckout',
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
        if($handle == 'countries')
        {
            $key = 'country';
        } else $key = rtrim($handle, 's');
        $key = rtrim($handle, 's');
        // If we're just getting the count, let's return it
        if($handle == 'count')
        {
            return $resp->{$handle};
        }
        if(!array_key_exists($key, $types))
        {
            return $resp;
        }
        $class = $types[$key];

        if(self::isList($resp, $handle))
        {
            $mapped = array();
            foreach($resp->{$handle} as $item)
            {
                array_push($mapped, $class::createFromJson($item, $opts));
            }
            return $mapped;
        } else {
            return $class::createFromJson($resp, $opts);
        }
    }

    public static function isList($data, $handle)
    {
        if(is_array($data->{$handle}))
        {
            return TRUE;
        }
        return FALSE;
    }
}

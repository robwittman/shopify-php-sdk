<?php

namespace Shopify;

class Inflector
{
    public static $cases = array(
        'addresses'                     => 'address',
        'application_charges'           => 'application_charge',
        'application_credits'           => 'application_credit',
        'articles'                      => 'article',
        'assets'                        => 'asset',
        'blogs'                         => 'blog',
        'checkouts'                     => 'checkout',
        'collects'                      => 'collect',
        'comments'                      => 'comments',
        'countries'                     => 'country',
        'custom_collections'            => 'custom_collection',
        'customers'                     => 'customer',
        'discounts'                     => 'discount',
        'events'                        => 'event',
        'fulfillments'                  => 'fulfillment',
        'fulfillment_events'            => 'fulfillment_event',
        'gift_cards'                    => 'gift_card',
        'locations'                     => 'location',
        'metafields'                    => 'metafield',
        'orders'                        => 'order',
        'order_risks'                   => 'order_risk',
        'pages'                         => 'page',
        'policies'                      => 'policy',
        'products'                      => 'product',
        'provinces'                     => 'province',
        'recurring_application_charges' => 'recurring_application_charge',
        'redirects'                     => 'redirect',
        'refunds'                       => 'refund',
        'reports'                       => 'report',
        'script_tags'                   => 'script_tag',
        'shipping_zones'                => 'shipping_zone',
        'shop'                          => 'shop',
        'smart_collections'             => 'smart_collection',
        'themes'                        => 'theme',
        'transactions'                  => 'transaction',
        'usage_charges'                 => 'usage_charge',
        'users'                         => 'user',
        'variants'                      => 'variant',
        'webhooks'                      => 'webhook',
    );

    public static function pluralize($string)
    {
        $key = array_search($string, static::$cases);
        if (is_null($key)) {
            throw new \InvalidArgumentException(
                "Unable to pluralize {$string}"
            );
        }
        return $key;
    }

    public static function singularize($string)
    {
        if (isset(static::$cases[$string])) {
            return static::$cases[$string];
        }
        throw new \InvalidArgumentException(
            "Unable to singularize {$string}"
        );
    }

    public static function snakeToPascal($propertyName)
    {
        return str_replace('_', '', ucwords($propertyName, '_'));
    }
}

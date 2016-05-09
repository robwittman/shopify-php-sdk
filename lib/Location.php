<?php
/**
 * \Shopify\Location
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/location
 */
namespace Shopify;

use Shopify\Util;

class Location extends AbstractObject
{
    protected static $classHandle = 'location';
    protected static $classUrl = 'locations';

    public function create()
    {
        throw new Exception\ApiException("API SDK cannot be used to create a 'Location' resource");
    }

    public function update()
    {
        throw new Exception\ApiException("API SDK cannot be used to update a 'Location' resource");
    }

    public function delete()
    {
        throw new Exception\ApiException("API SDK cannot be used to dlete a 'Location' resource");
    }
}

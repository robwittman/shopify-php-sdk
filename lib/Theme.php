<?php
/**
 * \Shopify\Theme
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/theme
 */
namespace Shopify;

use Shopify\Util;

class Theme extends AbstractObject
{
    protected static $classHandle = 'theme';
    protected static $classUrl = 'themes';

    public function getAssets()
    {
        $assets = self::call(self::$classUrl.'/'.$this->id.'/assets', 'GET');
        return Util\ObjectSet::createObjectFromJson($assets);
    }
}

<?php
/**
 * \Shopify\User
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/user
 */
namespace Shopify;

use Shopify\Util;

class User extends AbstractObject
{
    protected static $handle = 'user';
    protected static $classUrl = 'users';
}

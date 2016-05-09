<?php
/**
 * \Shopify\Webhook
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/webhook
 */
namespace Shopify;

use Shopify\Util;

class Webhook extends AbstractObject
{
    protected static $classHandle = 'webhook';
    protected static $classUrl = 'webhooks';
}

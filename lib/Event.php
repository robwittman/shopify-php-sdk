<?php
/**
 * \Shopify\Event
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/event
 */
namespace Shopify;

class Event extends AbstractObject
{
    protected static $classUrl = 'events';
    protected static $handle = 'event';
}

<?php

namespace Shopify\Storage;

use Shopify\Exception\ShopifySdkException;

class SessionStorage implements PersistentStorageInterface
{
    protected $prefix = 'SHPFY_';

    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            throw new ShopifySdkException(
                "Sessions are not active. Please start one using session_start()"
            );
        }
    }

    public function get($key)
    {
        if (isset($_SESSION[$this->prefix . $key])) {
            return $_SESSION[$this->prefix . $key];
        }
        return false;
    }

    public function set($key, $value)
    {
        $_SESSION[$this->prefix . $key] = $value;
    }
}

<?php

namespace Shopify\Storage;

use Shopify\Exception\ShopifySdkException;

class SessionStorage implements PersistentStorageInterface
{
    protected $prefix = 'SHPFY_';

    /**
     * @param $key
     * @return bool
     * @throws ShopifySdkException
     */
    public function get($key)
    {
        $this->assertSession();
        if (isset($_SESSION[$this->prefix . $key])) {
            return $_SESSION[$this->prefix . $key];
        }
        return false;
    }

    /**
     * @param $key
     * @param $value
     * @throws ShopifySdkException
     */
    public function set($key, $value)
    {
        $this->assertSession();
        $_SESSION[$this->prefix . $key] = $value;
    }

    /**
     * @throws ShopifySdkException
     */
    public function assertSession()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            throw new ShopifySdkException(
                "Sessions are not active. Please start one using session_start()"
            );
        }
    }
}

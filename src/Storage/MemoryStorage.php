<?php

namespace Shopify\Storage;

class MemoryStorage implements PersistentStorageInterface
{
    protected $session = [];

    public function get($key)
    {
        return isset($this->session[$key]) ? $this->session[$key] : null;
    }

    public function set($key, $value)
    {
        $this->session[$key] = $value;
    }
}

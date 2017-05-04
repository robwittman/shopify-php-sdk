<?php

namespace Shopify\Storage;

interface PersistentStorageInterface
{
    public function get($key);

    public function set($key, $value);
}

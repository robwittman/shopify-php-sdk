<?php

namespace Shopify\Options\ScriptTag;

use Shopify\Options\BaseOptions;

class CountOptions extends BaseOptions
{
    protected $src;

    public function setSrc($src)
    {
        $this->src = $src;
        return $this;
    }
}

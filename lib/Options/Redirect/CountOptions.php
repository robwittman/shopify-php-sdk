<?php

namespace Shopify\Options\Redirect;

use Shopify\Options\BaseOptions;

class CountOptions extends BaseOptions
{
    protected $path;

    protected $target;

    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }
}

<?php

namespace Shopify\Options\Redirect;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasPagination;
use Shopify\Concerns\Options\HasFields;
use Shopify\Concerns\Options\HasSinceId;

class ListOptions extends BaseOptions
{
    use HasPagination,
        HasFields,
        HasSinceId;

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

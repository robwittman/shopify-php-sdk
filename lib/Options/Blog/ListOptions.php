<?php

namespace Shopify\Options\Blog;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasFields;
use Shopify\Concerns\Options\HasSinceId;

class ListOptions extends BaseOptions
{
    use HasFields,
        HasSinceId;

    protected $handle;

    public function setHandle($handle)
    {
        $this->handle = $handle;
        return $this;
    }
}

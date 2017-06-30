<?php

namespace Shopify\Options\CustomCollection;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasUpdatedAt;
use Shopify\Concerns\Options\HasPublishedAt;

class CountOptions extends BaseOptions
{
    use HasCreatedAt,
        HasPublishedAt,
        HasUpdatedAt;

    protected $published_status;

    protected $product_id;

    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
        return $this;
    }

    public function setPublishedStatus($published_status)
    {
        $this->published_status = $published_status;
        return $this;
    }
}

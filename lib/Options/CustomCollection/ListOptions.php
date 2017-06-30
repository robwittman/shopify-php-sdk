<?php

namespace Shopify\Options\CustomCollection;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasUpdatedAt;
use Shopify\Concerns\Options\HasPagination;
use Shopify\Concerns\Options\HasFields;
use Shopify\Concerns\Options\HasPublishedAt;
use Shopify\Concerns\Options\HasSinceId;

class ListOptions extends BaseOptions
{
    use HasPagination,
        HasCreatedAt,
        HasPublishedAt,
        HasFields,
        HasUpdatedAt,
        HasSinceId;

    protected $ids;

    protected $product_id;

    protected $published_status;

    protected $handle;

    public function setIds($ids)
    {
        $this->ids = $ids;
        return $this;
    }

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

    public function setHandle($handle)
    {
        $this->handle = $handle;
        return $this;
    }
}

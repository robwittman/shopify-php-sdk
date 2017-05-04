<?php

namespace Shopify\Options\SmartCollection;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasUpdatedAt;
use Shopify\Concerns\Options\HasPagination;
use Shopify\Concerns\Options\HasFields;
use Shopify\Concerns\Options\HasSinceId;

class ListOptions extends BaseOptions
{
    use HasPagination,
        HasFields,
        HasUpdatedAt,
        HasSinceId;

    protected $title;

    protected $product_id;

    protected $handle;

    protected $published_status;

    protected $ids;

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
        return $this;
    }

    public function setHandle($handle)
    {
        $this->handle = $handle;
        return $this;
    }

    public function setPublishedStatus($published_status)
    {
        $this->published_status = $published_status;
        return $this;
    }

    public function setIds($ids)
    {
        $this->ids = $ids;
        return $this;
    }
}

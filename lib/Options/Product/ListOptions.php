<?php

namespace Shopify\Options\Product;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasUpdatedAt;
use Shopify\Concerns\Options\HasPagination;
use Shopify\Concerns\Options\HasFields;
use Shopify\Concerns\Options\HasSinceId;

class ListOptions extends BaseOptions
{
    use HasPagination,
        HasCreatedAt,
        HasFields,
        HasUpdatedAt,
        HasSinceId;

    protected $ids;

    protected $vendor;

    protected $title;

    protected $product_type;

    protected $handle;

    protected $collection_id;

    protected $published_status;

    public function setIds($ids)
    {
        $this->ids = $ids;
        return $this;
    }

    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setProductType($product_type)
    {
        $this->product_type = $product_type;
        return $this;
    }

    public function setHandle($handle)
    {
        $this->handle = $handle;
        return $this;
    }

    public function setCollectionId($collection_id)
    {
        $this->collection_id = $collection_id;
        return $this;
    }

    public function setPublishedStatus($published_status)
    {
        $this->published_status = $published_status;
        return $this;
    }
}

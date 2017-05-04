<?php

namespace Shopify\Options\Product;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasUpdatedAt;
use Shopify\Concerns\Options\HasPagination;

class CountOptions extends BaseOptions
{
    use HasPagination,
        HasCreatedAt,
        HasUpdatedAt;

    protected $vendor;

    protected $product_type;

    protected $collection_id;

    protected $published_status;

    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
        return $this;
    }

    public function setProductType($product_type)
    {
        $this->product_type = $product_type;
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

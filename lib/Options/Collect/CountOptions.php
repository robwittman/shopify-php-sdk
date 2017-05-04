<?php

namespace Shopify\Options\Article;

use Shopify\Options\BaseOptions;

class CountOptions extends BaseOptions
{
    protected $product_id;

    protected $collection_id;

    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
        return $this;
    }

    public function setCollectionId($collection_id)
    {
        $this->collection_id = $collection_id;
        return $this;
    }
}

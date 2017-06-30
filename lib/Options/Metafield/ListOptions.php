<?php

namespace Shopify\Options\Fulfillment;

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

    protected $namespace;

    protected $key;

    public function setNamespace($namespave)
    {
        $this->namespace = $namespace;
        return $this;
    }

    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }
}

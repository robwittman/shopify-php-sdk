<?php

namespace Shopify\Options\Customer;

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

    public function setIds($ids)
    {
        $this->ids = $ids;
        return $this;
    }
}

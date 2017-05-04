<?php

namespace Shopify\Options\Report;

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

    protected $ids;

    public function setIds($ids)
    {
        $this->ids = $ids;
        return $this;
    }
}

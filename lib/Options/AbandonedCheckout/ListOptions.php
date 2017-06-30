<?php

namespace Shopify\Options\AbandonedCheckout;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasUpdatedAt;
use Shopify\Concerns\Options\HasPagination;
use Shopify\Concerns\Options\HasSinceId;

class ListOptions extends BaseOptions
{
    use HasCreatedAt,
        HasPagination,
        HasUpdatedAt,
        HasSinceId;

    protected $status;
    
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}

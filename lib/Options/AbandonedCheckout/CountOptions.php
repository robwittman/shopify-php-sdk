<?php

namespace Shopify\Options\AbandonedCheckout;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasUpdatedAt;
use Shopify\Concerns\Options\HasSinceId;

class CountOptions extends BaseOptions
{
    use HasCreatedAt,
        HasUpdatedAt,
        HasSinceId;

    protected $status;

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}

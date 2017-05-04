<?php

namespace Shopify\Options\Order;

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

    protected $processed_at_min;

    protected $processed_at_max;

    protected $status;

    protected $financial_status;

    protected $fulfillment_status;

    public function setProcessedAtMin($processed_at_min)
    {
        $this->processed_at_min = $processed_at_min;
        return $this;
    }

    public function setProcessedAtMax($processed_at_max)
    {
        $this->processed_at_max = $processed_at_max;
        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function setFinancialStatus($financial_status)
    {
        $this->financial_status = $financial_status;
        return $this;
    }

    public function setFulfillmentStatus($fulfillment_status)
    {
        $this->fulfillment_status = $fulfillment_status;
        return $this;
    }
}

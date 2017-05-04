<?php

namespace Shopify\Options\Order;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasUpdatedAt;
use Shopify\Concerns\Options\HasFields;

class CountOptions extends BaseOptions
{
    use HasCreatedAt,
        HasUpdatedAt;

    protected $status;

    protected $financial_status;

    protected $fulfillment_status;

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

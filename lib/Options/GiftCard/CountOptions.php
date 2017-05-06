<?php

namespace Shopify\Options\GiftCard;

use Shopify\Options\BaseOptions;

class CountOptions extends BaseOptions
{
    protected $status;

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}

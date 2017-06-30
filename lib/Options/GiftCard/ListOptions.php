<?php

namespace Shopify\Options\GiftCard;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasPagination;
use Shopify\Concerns\Options\HasFields;

class ListOptions extends BaseOptions
{
    use HasPagination,
        HasFields;

    protected $status;

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}

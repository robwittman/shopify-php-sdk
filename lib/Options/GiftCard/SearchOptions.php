<?php

namespace Shopify\Options\GiftCard;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasPagination;
use Shopify\Concerns\Options\HasFields;

class SearchOptions extends BaseOptions
{
    use HasPagination,
        HasFields;

    protected $order;

    protected $query;

    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }
}

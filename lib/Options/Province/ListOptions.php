<?php

namespace Shopify\Options\Province;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasFields;
use Shopify\Concerns\Options\HasSinceId;

class ListOptions extends BaseOptions
{
    use HasFields,
        HasSinceId;

    protected $country_id;

    public function setCountryId($country_id)
    {
        $this->country_id = $country_id;
        return $this;
    }
}

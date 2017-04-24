<?php

namespace Shopify\Object;

use Shopify\Concerns\HasId;

class Report extends AbstractObject
{
    use HasId;

    protected $category;
    protected $name;
    protected $shopify_ql;
}

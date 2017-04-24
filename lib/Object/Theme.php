<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Theme extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $name;
    protected $role;
    protected $previewable;
    protected $processing;
}

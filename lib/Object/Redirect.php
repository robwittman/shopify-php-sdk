<?php

namespace Shopify\Object;

use Shopify\Concerns\HasId;

class Redirect extends AbstractObject
{
    use HasId;

    protected $path;
    protected $target;
}

<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class ScriptTag extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $event;
    protected $src;
    protected $display_scope;
}

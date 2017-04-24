<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class SmartCollection extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $body_html;
    protected $handle;
    protected $image;
    protected $published_at;
    protected $published_scope;
    protected $rules;
    protected $disjunctive;
    protected $sort_order;
    protected $template_suffix;
    protected $title;
}

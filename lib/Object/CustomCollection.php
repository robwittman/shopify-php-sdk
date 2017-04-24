<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class CustomCollection extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $body_html;
    protected $handle;
    protected $image;
    protected $metafield;
    protected $published;
    protected $published_at;
    protected $published_scope;
    protected $sort_order;
    protected $template_suffix;
    protected $title;
}

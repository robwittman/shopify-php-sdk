<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Collect extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * The id of the custom collection containing the product
     * @var integer
     */
    protected $collection_id;

    /**
     * States whether or not the collect is featured. Valid values are "true" or "false".
     * @var boolean
     */
    protected $featured;

    /**
     * A number specifying the manually sorted position of this product in a custom collection.
     * The first position is 1. This value only applies when the custom collection is viewed using the Manual sort order.
     * @var integer
     */
    protected $position;

    /**
     * The unique numeric identifier for the product in the custom collection.
     * @var integer
     */
    protected $product_id;

    /**
     * This is the same value as position but padded with leading zeroes to make it alphanumeric-sortable.
     * @var string
     */
    protected $sort_value;
}

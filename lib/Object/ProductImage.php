<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class ProductImage extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * The order of the product image in the list. The first product image
     * is at position 1 and is the "main" image for the product.
     * @var integer
     */
    protected $position;

    /**
     * The id of the product associated with the image.
     * @var integer
     */
    protected $product_id;

    /**
     * An array of variant ids associated with the image.
     * @var array
     */
    protected $variant_ids;

    /**
     * Specifies the location of the product image.
     * @var string
     */
    protected $src;
}

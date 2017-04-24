<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class ProductVariant extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * The barcode, UPC or ISBN number for the product.
     * @var string
     */
    protected $barcode;

    /**
     * The competitors prices for the same item.
     * @var float
     */
    protected $compare_at_price;

    /**
     * Service which is doing the fulfillment.
     * Possible values are manual or the handle of a FulfillmentService.
     * @var string
     */
    protected $fulfillment_service;

    /**
     * The weight of the product variant in grams.
     * @var integer
     */
    protected $grams;

    /**
     * The unique numeric identifier for a product's image.
     * Image must be associated to the same product as the variant.
     * @var integer
     */
    protected $image_id;

    /**
     * Specifies whether or not Shopify tracks the number of items in stock for
     * this product variant. Valid values are "blank" or "shopify"
     * @var string
     */
    protected $inventory_management;

    /**
     * Specifies whether or not customers are allowed to place an order
     * for a product variant when it's out of stock. Valid values are:
     * "deny (default)" or "continue"
     * @var string
     */
    protected $inventory_policy;

    /**
     * The number of items in stock for this product variant.
     * @var integer
     */
    protected $inventory_quantity;

    /**
     * The original stock level the client believes the product variant has.
     * This should be sent to avoid a race condition when the item being
     * adjusted is simultaneously sold online.
     * @var integer
     */
    protected $old_inventory_quantity;

    /**
     * Instead of sending a new and old value for inventory an adjustment
     * value can be sent. If an adjustment value is sent it will take priority.
     * @var integer
     */
    protected $inventory_quantity_adjustment;

    /**
     * Attaches additional information to a shop's resources.
     * @var Metafield[]
     */
    protected $metafield;

    /**
     * Custom properties that a shop owner can use to define product variants.
     * Multiple options can exist. Options are represented as: option1, option2,
     * option3. The default value is 'Default Title'.
     * @var string
     */
    protected $option1;

    /**
     * Custom properties that a shop owner can use to define product variants.
     * Multiple options can exist. Options are represented as: option1, option2,
     * option3. The default value is 'Default Title'.
     * @var string
     */
    protected $option2;

    /**
     * Custom properties that a shop owner can use to define product variants.
     * Multiple options can exist. Options are represented as: option1, option2,
     * option3. The default value is 'Default Title'.
     * @var string
     */
    protected $option3;

    /**
     * The order of the product variant in the list of product variants. 1 is the first position.
     * @var integer
     */
    protected $position;

    /**
     * The price of the product variant.
     * @var float
     */
    protected $price;

    /**
     * The unique numeric identifier for the product.
     * @var integer
     */
    protected $product_id;

    /**
     * Specifies whether or not a customer needs to provide a shipping address
     * when placing an order for this product variant. Valid values are: true, false
     * @var boolean
     */
    protected $requires_shipping;

    /**
     * A unique identifier for the product in the shop.
     * @var string
     */
    protected $sku;

    /**
     * Specifies whether or not a tax is charged when the product variant is sold.
     * @var boolean
     */
    protected $taxable;

    /**
     * The title of the product variant.
     * @var string
     */
    protected $title;

    /**
     * The weight of the product variant in the unit system specified with weight_unit.
     * @var integer
     */
    protected $weight;

    /**
     * The unit system that the product variant's weight is measure in.
     * The weight_unit can be either "g", "kg, "oz", or "lb".
     * @var string
     */
    protected $weight_unit;
}

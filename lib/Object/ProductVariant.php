<?php
/**
 *
 * Shopify\Object\ProductVariant
 *
 * A product variant is a different version of a product, such as differing sizes or differing colors.
 *
 * MIT License
 *
 * Copyright (c) Rob Wittman 2016
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @package Shopify
 * @author Rob Wittman <rob@ihsdigital.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/product_variant
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;
use Shopify\Concerns\HasMetafields;

class ProductVariant extends AbstractObject
{
    use HasTimestamps,
        HasMetafields,
        HasId;

    public static function getApiHandle()
    {
        return 'variants';
    }

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

    public function getBarcode()
    {
        return $this->get('barcode');
    }

    public function setBarcode($barcode)
    {
        $this->set('barcode', $barcode);
        return $this;
    }

    public function getCompareAtPrice()
    {
        return $this->get('compare_at_price');
    }

    public function setCompareAtPrice($compare_at_price)
    {
        $this->set('compare_at_price', $compare_at_price);
        return $this;
    }

    public function getFulfillmentService()
    {
        return $this->get('fulfillment_service');
    }

    public function setFulfillmentService($fulfillment_service)
    {
        $this->set('fulfillment_service', $fulfillment_service);
        return $this;
    }

    public function getGrams()
    {
        return $this->get('grams');
    }

    public function setGrams($grams)
    {
        $this->set('grams', $grams);
        return $this;
    }

    public function getImageId()
    {
        return $this->get('image_id');
    }

    public function setImageId($image_id)
    {
        $this->set('image_id', $image_id);
        return $this;
    }

    public function getInventoryManagement()
    {
        return $this->get('inventory_management');
    }

    public function setInventoryManagement($inventory_management)
    {
        $this->set('inventory_management', $inventory_management);
        return $this;
    }

    public function getInventoryPolicy()
    {
        return $this->get('inventory_policy');
    }

    public function setInventoryPolicy($inventory_policy)
    {
        $this->set('inventory_policy', $inventory_policy);
        return $this;
    }

    public function getOldInventoryQuantity()
    {
        return $this->get('old_inventory_quantity');
    }

    public function setOldInventoryQuantity($old_inventory_quantity)
    {
        $this->set('old_inventory_quantity', $old_inventory_quantity);
        return $this;
    }

    public function getInventoryQuantityAdjustment()
    {
        return $this->get('inventory_quantity_adjustment');
    }

    public function setInventoryQuantityAdjustment($inventory_quantity_adjustment)
    {
        $this->set('inventory_quantity_adjustment', $inventory_quantity_adjustment);
        return $this;
    }

    public function getOption1()
    {
        return $this->get('option1');
    }

    public function setOption1($option1)
    {
        $this->set('option1', $option1);
        return $this;
    }

    public function getOption2()
    {
        return $this->get('option2');
    }

    public function setOption2($option2)
    {
        $this->set('option2', $option2);
        return $this;
    }

    public function getOption3()
    {
        return $this->get('option3');
    }

    public function setOption3($option3)
    {
        $this->set('option3', $option3);
        return $this;
    }

    public function getPosition()
    {
        return $this->get('position');
    }

    public function setPosition($position)
    {
        $this->set('position', $position);
        return $this;
    }

    public function getPrice()
    {
        return $this->get('price');
    }

    public function setPrice($price)
    {
        $this->set('price', $price);
        return $this;
    }

    public function getProductId()
    {
        return $this->get('product_id');
    }

    public function setProductId($product_id)
    {
        $this->set('product_id', $product_id);
        return $this;
    }

    public function getRequiresShipping()
    {
        return $this->get('requires_shipping');
    }

    public function setRequiresShipping($reqiures_shipping)
    {
        $this->set('requires_shipping', $reqiures_shipping);
        return $this;
    }

    public function getSku()
    {
        return $this->get('sku');
    }

    public function setSku($sku)
    {
        $this->set('sku', $sku);
        return $this;
    }

    public function getTaxable()
    {
        return $this->get('taxable');
    }

    public function setTaxable($taxable)
    {
        $this->set('taxable', $taxable);
        return $this;
    }

    public function getTitle()
    {
        return $this->get('title');
    }

    public function setTitle($title)
    {
        $this->set('title', $title);
        return $this;
    }

    public function getWeight()
    {
        return $this->get('weight');
    }

    public function setWeight($weight)
    {
        $this->set('weight', $weight);
        return $this;
    }

    public function getWeightUnit()
    {
        return $this->get('weight_unit');
    }

    public function setWeightUnit($weight_unit)
    {
        $this->set('weight_unit', $weight_unit);
        return $this;
    }

}

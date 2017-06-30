<?php
/**
 *
 * Shopify\Object\LineItem
 *
 * Object representing a single Line Item for an order
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
 */

namespace Shopify\Object;

use Shopify\Concerns\HasId;

class LineItem extends AbstractObject
{
    use HasId;

    /**
     * The amount available to fulfill.
     * @var integer
     */
    protected $fulfillable_quantity;

    /**
     * Service provider who is doing the fulfillment
     * @var string
     */
    protected $fulfillment_service;

    /**
     * How far along an order is in terms line items fulfilled.
     * Valid values are: fulfilled, null or partial.
     * @var string
     */
    protected $fulfillment_status;

    /**
     * The weight of the item in grams.
     * @var integer
     */
    protected $grams;

    /**
     * The price of the item before discounts have been applied.
     * @var string
     */
    protected $price;

    /**
     * The unique numeric identifier for the product in the fulfillment
     * @var integer
     */
    protected $product_id;

    /**
     * The number of products that were purchased.
     * @var integer
     */
    protected $quantity;

    /**
     * States whether or not the fulfillment requires shipping.
     * Values are: true or false.
     * @var boolean
     */
    protected $requires_shipping;

    /**
     * A unique identifier of the item in the fulfillment.
     * @var string
     */
    protected $sku;

    /**
     * The title of the product.
     * @var string
     */
    protected $title;

    /**
     * The id of the product variant.
     * @var integer
     */
    protected $variant_id;

    /**
     * The title of the product variant.
     * @var string
     */
    protected $variant_title;

    /**
     * The name of the supplier of the item.
     * @var string
     */
    protected $vendor;

    /**
     * The name of the product variant.
     * @var string
     */
    protected $name;

    /**
     * States whether or not the line_item is a gift card. If so, the item is
     * not taxed or considered for shipping charges.
     * @var string
     */
    protected $gift_card;

    /**
     * An array of custom information for an item that has been added to the cart.
     * @var array
     */
    protected $properties;

    /**
     * States whether or not the product was taxable. Values are: true or false.
     * @var boolean
     */
    protected $taxable;

    /**
     *  A list of tax_line objects, each of which details the taxes applicable to this line_item.
     * @var TaxLine
     */
    protected $tax_lines;

    /**
     * The total discount amount applied to this line item. This value is not subtracted in the line item price.
     * @var string
     */
    protected $total_discount;

    public function getFulfillableQuantity()
    {
        return $this->get('fulfillable_quantity');
    }

    public function setFulfillableQuantity($fulfillable_quantity)
    {
        $this->set('fulfillable_quantity', $fulfillable_quantity);
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

    public function getFulfillmentStatus()
    {
        return $this->get('fulfillment_status');
    }

    public function setFulfillmentStatus($fulfillment_status)
    {
        $this->set('fulfillment_status', $fulfillment_status);
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

    public function getPrice()
    {
        return $this->get('price');
    }

    public function setPrice($price)
    {
        $this->set('price', $price);
        return $this;
    }

    public function getProductid()
    {
        return $this->get('product_id');
    }

    public function setProductid($product_id)
    {
        $this->set('product_id', $product_id);
        return $this;
    }

    public function getQuantity()
    {
        return $this->get('quantity');
    }

    public function setQuantity($quantity)
    {
        $this->set('quantity', $quantity);
        return $this;
    }

    public function getRequiresShipping()
    {
        return $this->get('requires_shipping');
    }

    public function setRequiresShipping($requires_shipping)
    {
        $this->set('requires_shipping', $requires_shipping);
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

    public function getTitle()
    {
        return $this->get('title');
    }

    public function setTitle($title)
    {
        $this->set('title', $title);
        return $this;
    }

    public function getVariantId()
    {
        return $this->get('variant_id');
    }

    public function setVariantId($variant_id)
    {
        $this->set('variant_id', $variant_id);
        return $this;
    }

    public function getVariantTitle()
    {
        return $this->get('variant_title');
    }

    public function setVariantTitle($variant_title)
    {
        $this->set('variant_title', $variant_title);
        return $this;
    }

    public function getVendor()
    {
        return $this->get('vendor');
    }

    public function setVendor($vendor)
    {
        $this->set('vendor', $vendor);
        return $this;
    }

    public function getName()
    {
        return $this->get('name');
    }

    public function setName($name)
    {
        $this->set('name', $name);
        return $this;
    }

    public function getGiftCard()
    {
        return $this->get('gift_card');
    }

    public function setGiftCard($gift_card)
    {
        $this->set('gift_card', $gift_card);
        return $this;
    }

    public function getProperties()
    {
        return $this->get('properties');
    }

    public function setProperties($properties)
    {
        $this->set('properties', $properties);
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

    public function getTaxLines()
    {
        return $this->get('tax_lines');
    }

    public function setTaxLines($tax_lines)
    {
        $this->set('tax_lines', $tax_lines);
        return $this;
    }

    public function getTotalDiscount()
    {
        return $this->get('total_discount');
    }

    public function setTotalDiscount($total_discount)
    {
        $this->set('total_discount', $total_discount);
        return $this;
    }
}

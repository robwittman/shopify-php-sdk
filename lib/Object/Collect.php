<?php
/**
 *
 * Shopify\Object\Collect
 *
 * A collect is an object that connects a product to a custom collection.
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
 * @link https://help.shopify.com/api/reference/collect
 */

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

    public function getCollectionId()
    {
        return $this->get('collection_id');
    }

    public function setCollectionId($collection_id)
    {
        $this->set('collection_id', $collection_id);
        return $this;
    }

    public function getFeatured()
    {
        return $this->get('featured');
    }

    public function setFeatured($featured)
    {
        $this->set('featured', $featured);
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

    public function getProductId()
    {
        return $this->get('product_id');
    }

    public function setProductId($product_id)
    {
        $this->set('product_id', $product_id);
        return $this;
    }

    public function getSortValue()
    {
        return $this->get('sort_value');
    }

    public function setSortValue($sort_value)
    {
        $this->set('sort_value', $sort_value);
        return $this;
    }
}

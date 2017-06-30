<?php
/**
 *
 * Shopify\Object\ProductOption
 *
 * A ProductOption represents an option object for a product. It contains the name
 * of the option, and the possible values as provided by variants
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

class ProductOption extends AbstractObject
{
    use HasId;

    /**
     * ID of the product this option is for
     * @var integer
     */
    protected $product_id;

    /**
     * Name of the option
     * @var string
     */
    protected $name;

    /**
     * Position of the option
     * Can be 1, 2, or 3
     * @var integer
     */
    protected $position;

    /**
     * Array of possible values for the option. Compiled from supplied variants
     * @var array
     */
    protected $values;

    public function getProductId()
    {
        return $this->get('product_id');
    }

    public function setProductId($product_id)
    {
        $this->set('product_id', $product_id);
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

    public function getPosition()
    {
        return $this->get('position');
    }

    public function setPosition($position)
    {
        $this->set('position', $position);
        return $this;
    }

    public function getValues()
    {
        return $this->get('values');
    }

    public function setValues($values)
    {
        $this->set('values', $values);
        return $this;
    }
}

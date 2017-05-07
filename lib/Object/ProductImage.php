<?php
/**
 *
 * Shopify\Object\ProductImage
 *
 * Products are easier to sell if customers can see pictures of them, which is
 * why there are product images.
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
 * @link https://help.shopify.com/api/reference/product_image
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class ProductImage extends AbstractObject
{
    use HasTimestamps,
        HasId;

    public static function getApiHandle()
    {
        return 'images';
    }

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

    public function getVariantIds()
    {
        return $this->get('variant_ids');
    }

    public function setVariantIds($variant_ids)
    {
        $this->set('variant_ids', $variant_ids);
        return $this;
    }

    public function getSrc()
    {
        return $this->get('src');
    }

    public function setSrc($src)
    {
        $this->set('src', $src);
        return $this;
    }
}

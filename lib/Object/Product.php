<?php
/**
 *
 * Shopify\Object\Product
 *
 * A product is an individual item for sale in a Shopify store. Products are often
 * physical, but they don't have to be. For example, a digital download (such as a
 * movie, music or ebook file) also qualifies as a product, as do services (such as
 * equipment rental, work for hire, customization of another product or an extended
 * warranty). Simply put: if it's something for sale in a store, then it's a product.
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
 * @link https://help.shopify.com/api/reference/product
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;
use Shopify\Object\ProductVariant;
use Shopify\Object\ProductImage;
use Shopify\Object\ProductOption;

class Product extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * @return string
     */
    public static function getApiHandle()
    {
        return 'products';
    }

    /**
     * The description of the product, complete with HTML formatting.
     * @var string
     */
    protected $body_html;

    /**
     * A human-friendly unique string for the Product automatically generated from its title.
     * They are used by the Liquid templating language to refer to objects.
     * @var string
     */
    protected $handle;

    /**
     * A list of image objects, each one representing an image associated with the product.
     * @var ProductImage[]
     */
    protected $images;

    /**
     * Custom product property names like "Size", "Color", and "Material".
     * Products are based on permutations of these options. A product may have
     * a maximum of 3 options. 255 characters limit each.
     * @var ProductOption[]
     */
    protected $options;

    /**
     * A categorization that a product can be tagged with, commonly used for filtering and searching.
     * @var string
     */
    protected $product_type;

    /**
     * The date and time when the product was published to the Online Store channel.
     * The API returns this value in ISO 8601 format. A value of null indicates that
     * the product is not published to Online Store.
     * @var string
     */
    protected $published_at;

    /**
     * Indicates whether the product is published to the Point of Sale channel.
     * @var string
     */
    protected $published_scope;

    /**
     * A categorization that a product can be tagged with,
     * commonly used for filtering and searching. Each comma-separated tag has
     * a character limit of 255.
     * @var string
     */
    protected $tags;

    /**
     * The suffix of the liquid template being used. By default, the original
     * template is called product.liquid, without any suffix. Any additional
     * templates will be: product.suffix.liquid.
     * @var string
     */
    protected $template_suffix;

    /**
     * The name of the product. In a shop's catalog, clicking on a product's
     * title takes you to that product's page. On a product's page, the
     * product's title typically appears in a large font.
     * @var string
     */
    protected $title;

    /**
     * The name of the product, to be used for SEO purposes.
     * This will generally be added to the <meta name='title'> tag
     * @var string
     */
    protected $metafields_global_title_tag;

    /**
     * The description of the product, to be used for SEO purposes.
     * This will generally be added to the <meta name='description'> tag.
     * @var string
     */
    protected $metafields_global_description_tag;

    /**
     * A list of variant objects, each one representing a slightly different
     * version of the product. For example, if a product comes in different
     * sizes and colors, each size and color permutation (such as "small black",
     * "medium black", "large blue"), would be a variant.
     * @var ProductVariant[]
     */
    protected $variants;

    /**
     * The name of the vendor of the product.
     * @var string
     */
    protected $vendor;

    protected $image;

    public function getBodyHtml()
    {
        return $this->get('body_html');
    }

    public function setBodyHtml($bodyHtml)
    {
        $this->set('body_html', $bodyHtml);
        return $this;
    }

    public function getHandle()
    {
        return $this->get('handle');
    }

    public function setHandle($handle)
    {
        $this->set('handle', $handle);
        return $this;
    }

    public function getImages()
    {
        return $this->get('images');
    }

    /**
     * @param ProductImage[] $images
     */
    public function setImages($images)
    {
        $this->set('images', $images);
        return $this;
    }

    public function getOptions()
    {
        return $this->get('options');
    }

    /**
     * @param ProductOption[] $options
     */
    public function setOptions($options)
    {
        $this->set('options', $options);
        return $this;
    }

    public function getProductType()
    {
        return $this->get('product_type');
    }

    public function setProductType($product_type)
    {
        $this->set('product_type', $product_type);
        return $this;
    }

    public function getPublishedAt()
    {
        return $this->get('published_at');
    }

    public function setPublishedAt($published_at)
    {
        $this->set('published_at', $published_at);
        return $this;
    }

    public function getPublishedScope()
    {
        return $this->get('published_scope');
    }

    public function setPublishedScope($published_scope)
    {
        $this->set('published_scope', $published_scope);
        return $this;
    }

    public function getTags()
    {
        return $this->get('tags');
    }

    public function setTags($tags)
    {
        $this->set('tags', $tags);
        return $this;
    }

    public function getTemplateSuffix()
    {
        return $this->get('template_suffix');
    }

    public function setTemplateSuffix($template_suffix)
    {
        $this->set('template_suffix', $template_suffix);
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

    public function getMetafieldsGlobalTitleTag()
    {
        return $this->get('metafields_global_title_tag');
    }

    public function setMetafieldsGlobalTitleTag($metafields_global_title_tag)
    {
        $this->set('metafields_global_title_tag', $metafields_global_title_tag);
        return $this;
    }

    public function getMetafieldsGlobalDescriptionTag()
    {
        return $this->get('metafields_global_description_tag');
    }

    public function setMetafieldsGlobalDescriptionTag($metafields_global_description_tag)
    {
        $this->set('metafields_global_description_tag', $metafields_global_description_tag);
        return $this;
    }

    public function getVariants()
    {
        return $this->get('variants');
    }

    /**
     * @param ProductVariant[] $variants
     */
    public function setVariants($variants)
    {
        $this->set('variants', $variants);
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

    public function getImage()
    {
        return $this->get('image');
    }

    /**
     * @param ProductImage $image
     */
    public function setImage($image)
    {
        $this->set('image', $image);
        return $this;
    }
}

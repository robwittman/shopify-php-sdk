<?php
/**
 *
 * Shopify\Object\CustomCollection
 *
 * A custom collection is a grouping of products that a shop owner can create to
 * make their shops easier to browse. A shop owner creates a custom collection
 * and then selects the products that will go into it.
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
 * @link https://help.shopify.com/api/reference/customcollection
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;
use Shopify\Concerns\HasMetafields;

class CustomCollection extends AbstractObject
{
    use HasTimestamps,
        HasMetafields,
        HasId;

    public static function getApiHandle()
    {
        return 'custom_collections';
    }
    /**
     * The description of the custom collection, complete with HTML markup.
     * Many templates display this on their custom collection pages.
     * @var string
     */
    protected $body_html;

    /**
     * A human-friendly unique string for the custom collection automatically
     * generated from its title. This is used in shop themes by the Liquid
     * templating language to refer to the custom collection. Limit of 255 characters.
     * @var string
     */
    protected $handle;

    /**
     * Image associated with the custom collection. Valid values are:
     *      attachment: An image attached to a shop's theme returned as Base64-encoded binary data.
     *      src:        Source URL that specifies the location of the image.
     * @var string
     */
    protected $image;

    /**
     * States whether the custom collection is visible. Valid values are
     * "true" for visible and "false" for hidden.
     * @var boolean
     */
    protected $published;

    /**
     * This can have two different types of values, depending on whether the
     * custom collection has been published (i.e., made visible to customers):
     *
     *  If the custom collection is published, this value is the date and time
     *  when it was published. The API returns this value in ISO 8601 format.
     *
     *  If the custom collection is hidden (i.e., not published), this value is null.
     *  Changing a custom collection's status from published to hidden changes its
     *  published_at property to null.
     * @var mixed
     */
    protected $published_at;

    /**
     * The sales channels in which the custom collection is visible.
     * @var string
     */
    protected $published_scope;

    /**
     * The order in which products in the custom collection appear
     * @var string
     */
    protected $sort_order;

    /**
     * The suffix of the liquid template being used. By default, the original
     * template is called product.liquid, without any suffix. Any additional
     * templates will be: product.suffix.liquid.
     * @var string
     */
    protected $template_suffix;

    /**
     * The name of the custom collection. Limit of 255 characters.
     * @var string
     */
    protected $title;

    public function getBodyHtml()
    {
        return $this->get('body_html');
    }

    public function setBodyHtml($body_html)
    {
        $this->set('body_html', $body_html);
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

    public function getImage()
    {
        return $this->get('image');
    }

    public function setImage($image)
    {
        $this->set('image', $image);
        return $this;
    }

    public function getPublished()
    {
        return $this->get('published');
    }

    public function setPublished($published)
    {
        $this->set('published', $published);
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

    public function getSortOrder()
    {
        return $this->get('sort_order');
    }

    public function setSortOrder($sort_order)
    {
        $this->set('sort_order', $sort_order);
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
}

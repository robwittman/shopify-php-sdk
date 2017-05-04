<?php
/**
 *
 * Shopify\Object\SmartCollection
 *
 * A smart collection is a grouping of products defined by simple rules set by
 * shop owners. A shop owner creates a smart collection and then sets the rules
 * that determine which products go in them. Shopify automatically changes the
 * contents of smart collections based on their rules.
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
 * @link https://help.shopify.com/api/reference/smartcollection
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class SmartCollection extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * The description of the smart collection, complete with HTML markup.
     * Many templates display this on their smart collection page.
     * @var string
     */
    protected $body_html;

    /**
     * A human-friendly unique string for the smart collection automatically
     * generated from its title. This is used in shop themes by the Liquid
     * templating language to refer to the smart collection.
     * Limit of 255 characters.
     * @var string
     */
    protected $handle;

    /**
     * The collection image.
     * @var object
     */
    protected $image;

    /**
     * This can have two different types of values, depending on whether the smart
     * collection has been published (i.e., made visible to customers):
     * @var mixed
     */
    protected $published_at;

    /**
     * The sales channels in which the smart collection is visible.
     * @var string
     */
    protected $published_scope;

    /**
     * The list of rules that define what products go into the smart collection
     * @var SmartCollectionRule[]
     */
    protected $rules;

    /**
     * If false, products must match all of the rules to be included in the collection.
     * If true, products can only match one of the rules.
     * @var boolean
     */
    protected $disjunctive;

    /**
     * The order in which products in the smart collection appear.
     * @var string
     */
    protected $sort_order;

    /**
     * The suffix of the template you are using. By default, the original template
     * is called product.liquid, without any suffix. Any additional templates
     * will be: product.suffix.liquid.
     * @var string
     */
    protected $template_suffix;

    /**
     * The name of the smart collection. Limit of 255 characters.
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

    public function getRules()
    {
        return $this->get('rules');
    }

    public function setRules($rules)
    {
        $this->set('rules', $rules);
        return $this;
    }

    public function getDisjunctive()
    {
        return $this->get('disjunctive');
    }

    public function setDisjunctive($disjunctive)
    {
        $this->set('disjunctive', $disjunctive);
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

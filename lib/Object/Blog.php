<?php
/**
 *
 * Shopify\Object\Blog
 *
 * In addition to an online storefront, Shopify shops come with a built-in
 * blogging engine, allowing a shop to have one or more blogs.
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
 * @link https://help.shopify.com/api/reference/blog
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;
use Shopify\Concerns\HasMetafields;

class Blog extends AbstractObject
{
    use HasTimestamps,
        HasMetafields,
        HasId;

    /**
     * Indicates whether readers can post comments to the blog and if comments are moderated or not
     * @var string
     */
    protected $commentable;

    /**
     * Feedburner is a web feed management provider and can be enabled to provide
     * custom RSS feeds for Shopify bloggers. This property will default to blank
     * or "null" unless feedburner is enabled through the shop admin.
     * @var string
     */
    protected $feedburner;

    /**
     * URL to the feedburner location for blogs that have enabled feedburner through their store admin.
     * @var string
     */
    protected $feedburner_location;

    /**
     * A human-friendly unique string for a blog automatically generated from its title.
     * This handle is used by the Liquid templating language to refer to the blog.
     * @var string
     */
    protected $handle;

    /**
     * Tags are additional short descriptors formatted as a string of comma-separated values.
     * For example, if an article has three tags: tag1, tag2, tag3.
     * @var string
     */
    protected $tags;

    /**
     * States the name of the template a blog is using if it is using an alternate template.
     * If a blog is using the default blog.liquid template, the value returned is "null".
     * @var string
     */
    protected $template_suffix;

    /**
     * The title of the blog
     * @var string
     */
    protected $title;

    public function getCommentable()
    {
        return $this->get('commentable');
    }

    public function setCommentable($commentable)
    {
        $this->set('commentable', $commentable);
        return $this;
    }

    public function getFeedburner()
    {
        return $this->get('feedburner');
    }

    public function setFeedburner($feedburner)
    {
        $this->set('feedburner', $feedburner);
        return $this;
    }

    public function getFeedburnerLocation()
    {
        return $this->get('feedburner_location');
    }

    public function setFeedburnerLocation($feedburner_location)
    {
        $this->set('feedburner_location', $feedburner_location);
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
}

<?php
/**
*
* Shopify\Object\Article
*
* An article is a single entry in a blog.
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
* @link https://help.shopify.com/api/reference/article
*/

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;
use Shopify\Concerns\HasMetafields;

class Article extends AbstractObject
{
    use HasId,
        HasTimestamps,
        HasMetafields;

    /**
     * The name of the author of this article
     * @var string
     */
    protected $author;

    /**
     * A unique numeric identifier for the blog containing the article.
     * @var integer
     */
    protected $blog_id;

    /**
     * The text of the body of the article, complete with HTML markup.
     * @var string
     */
    protected $body_html;

    /**
     * A human-friendly unique string for an article automatically generated from its title.
     * It is used in the article's URL.
     * @var string
     */
    protected $handle;

    /**
     * The article image.
     * @var array
     */
    protected $image;

    /**
     * States whether or not the article is visible. Valid values are "true" for published or "false" for hidden.
     * @var boolean
     */
    protected $published;

    /**
     * The date and time when the article was published. The API returns this value in ISO 8601 format.
     * @var string
     */
    protected $published_at;

    /**
     * The text of the summary of the article, complete with HTML markup.
     * @var string
     */
    protected $summary_html;

    /**
     * Tags are additional short descriptors formatted as a string of comma-separated values.
     * For example, if an article has three tags: tag1, tag2, tag3.
     * @var string
     */
    protected $tags;

    /**
     * States the name of the template an article is using if it is using an alternate template.
     * If an article is using the default article.liquid template, the value returned is "null".
     * @var string
     */
    protected $template_suffix;

    /**
     * The title of the article.
     * @var string
     */
    protected $title;

    /**
     * A unique numeric identifier for the author of the article.
     * @var integer
     */
    protected $user_id;

    public function getAuthor()
    {
        return $this->get('author');
    }

    public function setAuthor($author)
    {
        $this->set('author', $author);
        return $this;
    }

    public function getBlogId()
    {
        return $this->get('blog_id');
    }

    public function setBlogId($blog_id)
    {
        $this->set('blog_id', $blog_id);
        return $this;
    }

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

    public function getSummaryHtml()
    {
        return $this->get('summary_html');
    }

    public function setSummaryHtml($summary_html)
    {
        $this->set('summary_html', $summary_html);
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

    public function getUserId()
    {
        return $this->get('user_id');
    }

    public function setUserId($user_id)
    {
        $this->set('user_id', $user_id);
        return $this;
    }
}

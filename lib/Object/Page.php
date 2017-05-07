<?php
/**
 *
 * Shopify\Object\Page
 *
 * In addition to an online storefront, Shopify shops come with a web page creation
 * tool, allowing a shop to have one or more pages. Shop owners are encouraged to
 * use pages for information that customers will use often, such as an 'About Us'
 * page, a 'Contact Us' page, a page with customer testimonials etc.
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
 * @link https://help.shopify.com/api/reference/page
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;
use Shopify\Concerns\HasMetafields;

class Page extends AbstractObject
{
    use HasTimestamps,
        HasMetafields,
        HasId;

    public static function getApiHandle()
    {
        return 'pages';
    }
    
    /**
     * The name of the person who created the page.
     * @var string
     */
    protected $author;

    /**
     * Text content of the page, complete with HTML markup.
     * @var string
     */
    protected $body_html;

    /**
     * A human-friendly unique string for the page automatically generated from
     * its title. This is used in shop themes by the Liquid templating language
     * to refer to the page.
     * @var string
     */
    protected $handle;

    /**
     * This can have two different types of values, depending on whether the page
     * has been published (i.e., made visible to the blog's readers).
     *
     * If the page is published, this value is the date and time when it was published.
     * The API returns this value in ISO 8601 format.
     *
     * If the page is a hidden, this value is null. Changing an page's status
     * from published to hidden changes its published_at property to null.
     * @var string
     */
    protected $published_at;

    /**
     * The id of the shop to which the page belongs.
     * @var integer
     */
    protected $shop_id;

    /**
     * The suffix of the liquid template being used. By default, the original
     * template is called page.liquid, without any suffix. Any additional templates
     * will be: page.suffix.liquid.
     * @var string
     */
    protected $template_suffix;

    /**
     * The title of the page
     * @var string
     */
    protected $title;

    public function getAuthor()
    {
        return $this->get('author');
    }

    public function setAuthor($author)
    {
        $this->set('author', $author);
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

    public function getPublishedAt()
    {
        return $this->get('published_at');
    }

    public function setPublishedAt($published_at)
    {
        $this->set('published_at', $published_at);
        return $this;
    }

    public function getShopId()
    {
        return $this->get('shop_id');
    }

    public function setShopId($shop_id)
    {
        $this->set('shop_id', $shop_id);
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

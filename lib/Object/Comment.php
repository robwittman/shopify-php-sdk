<?php
/**
 *
 * Shopify\Object\Comment
 *
 * A comment is a reader's response to an article in a blog. They appear on the
 * article page in chronological order, typically after the article body.
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
 * @link https://help.shopify.com/api/reference/comment
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Comment extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * A unique numeric identifier for the article to which the comment belongs.
     * @var integer
     */
    protected $article_id;

    /**
     * The name of the author of the comment.
     * @var string
     */
    protected $author;

    /**
     * A unique numeric identifier for the blog containing the article that the comment belongs to.
     * @var integer
     */
    protected $blog_id;

    /**
     * The basic textile markup of a comment.
     * @var string
     */
    protected $body;

    /**
     * The text of the comment, complete with HTML markup.
     * @var string
     */
    protected $body_html;

    /**
     * The email address of the author of the comment.
     * @var string
     */
    protected $email;

    /**
     * The IP address from which the comment was posted.
     * @var string
     */
    protected $ip;

    /**
     * The date and time when the comment was published. In the case of comments,
     * this is the date and time when the comment was created, meaning that it
     * has the same value as created_at. The API returns this value in ISO 8601 format.
     * @var string
     */
    protected $published_at;

    /**
     * The status of the comment.
     * @var string
     */
    protected $status;

    /**
     * The user agent string provided by the software (usually a browser) used to create the comment.
     * @var string
     */
    protected $user_agent;

    public function getArticleId()
    {
        return $this->get('article_id');
    }

    public function setArticleId($article_id)
    {
        $this->set('article_id', $article_id);
        return $this;
    }

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

    public function getBody()
    {
        return $this->get('body');
    }

    public function setBody($body)
    {
        $this->set('body', $body);
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

    public function getEmail()
    {
        return $this->get('email');
    }

    public function setEmail($email)
    {
        $this->set('email', $email);
        return $this;
    }

    public function getIp()
    {
        return $this->get('ip');
    }

    public function setIp($ip)
    {
        $this->set('ip', $ip);
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

    public function getStatus()
    {
        return $this->get('status');
    }

    public function setStatus($status)
    {
        $this->set('status', $status);
        return $this;
    }

    public function getUserAgent()
    {
        return $this->get('user_agent');
    }

    public function setUserAgent($user_agent)
    {
        $this->set('user_agent', $user_agent);
        return $this;
    }
}

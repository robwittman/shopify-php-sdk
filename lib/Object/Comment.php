<?php

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
}

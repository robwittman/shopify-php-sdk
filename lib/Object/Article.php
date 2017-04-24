<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Article extends AbstractObject
{
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
     * Attaches additional metadata to a store's resources:
     * @var array
     */
    protected $metafield;

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
}

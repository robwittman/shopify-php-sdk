<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Blog extends AbstractObject
{
    use HasTimestamps,
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
     * Attaches additional metadata to a store's resources:
     * @var array
     */
    protected $metafield;

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
}

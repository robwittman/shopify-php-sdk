<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;

class Asset extends AbstractObject
{
    use HasTimestamps;

    /**
     * An asset attached to a store's theme.
     * @var string
     */
    protected $attachment;

    /**
     * MIME representation of the content, consisting of the type and subtype of the asset.
     * @var string
     */
    protected $content_type;

    /**
     * The path to the asset within a shop. For example, the asset bg-body-green.gif is located in the assets folder.
     * @var string
     */
    protected $key;

    /**
     * The public facing URL of the asset.
     * @var string
     */
    protected $public_url;

    /**
     * The asset size in bytes.
     * @var integer
     */
    protected $size;

    /**
     * The source key copies an asset.
     * @var string
     */
    protected $source_key;

    /**
     * Specifies the location of an asset.
     * @var string
     */
    protected $src;

    /**
     * A unique numeric identifier for the theme.
     * @var integer
     */
    protected $theme_id;

    /**
     * The asset that you are adding.
     * @var string
     */
    protected $value;
}

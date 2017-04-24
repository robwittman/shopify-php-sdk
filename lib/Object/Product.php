<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Product extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * The description of the product, complete with HTML formatting.
     * @var string
     */
    protected $body_html;

    /**
     * A human-friendly unique string for the Product automatically generated from its title.
     * They are used by the Liquid templating language to refer to objects.
     * @var string
     */
    protected $handle;

    /**
     * A list of image objects, each one representing an image associated with the product.
     * @var ProductImage[]
     */
    protected $images;

    /**
     * Custom product property names like "Size", "Color", and "Material".
     * Products are based on permutations of these options. A product may have
     * a maximum of 3 options. 255 characters limit each.
     * @var ProductOption[]
     */
    protected $options;

    /**
     * A categorization that a product can be tagged with, commonly used for filtering and searching.
     * @var string
     */
    protected $product_type;

    /**
     * The date and time when the product was published to the Online Store channel.
     * The API returns this value in ISO 8601 format. A value of null indicates that
     * the product is not published to Online Store.
     * @var string
     */
    protected $published_at;

    /**
     * Indicates whether the product is published to the Point of Sale channel.
     * @var string
     */
    protected $published_scope;

    /**
     * A categorization that a product can be tagged with,
     * commonly used for filtering and searching. Each comma-separated tag has
     * a character limit of 255.
     * @var string
     */
    protected $tags;

    /**
     * The suffix of the liquid template being used. By default, the original
     * template is called product.liquid, without any suffix. Any additional
     * templates will be: product.suffix.liquid.
     * @var string
     */
    protected $template_suffix;

    /**
     * The name of the product. In a shop's catalog, clicking on a product's
     * title takes you to that product's page. On a product's page, the
     * product's title typically appears in a large font.
     * @var string
     */
    protected $title;

    /**
     * The name of the product, to be used for SEO purposes.
     * This will generally be added to the <meta name='title'> tag
     * @var string
     */
    protected $metafields_global_title_tag;

    /**
     * The description of the product, to be used for SEO purposes.
     * This will generally be added to the <meta name='description'> tag.
     * @var string
     */
    protected $metafields_global_description_tag;

    /**
     * A list of variant objects, each one representing a slightly different
     * version of the product. For example, if a product comes in different
     * sizes and colors, each size and color permutation (such as "small black",
     * "medium black", "large blue"), would be a variant.
     * @var ProductVariant[]
     */
    protected $variants;

    /**
     * The name of the vendor of the product.
     * @var string
     */
    protected $vendor;
}

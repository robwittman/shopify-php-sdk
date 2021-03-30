<?php

namespace Shopify\Object;

class PaginationLink
{
    public $previous;

    public $next;

    public function __construct(string $linkHeader)
    {
        if (empty($linkHeader)) {
            return;
        }

        foreach (explode(',', $linkHeader) as $item) {
            if (preg_match('/<([\s\S]+?)>; rel=\"(next|previous)\"/', $item, $match)) {
                $this->{$match[2]} = $match[1];
            }
        }
    }
}

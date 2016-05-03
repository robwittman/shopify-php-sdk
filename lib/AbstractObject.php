<?php

namespace Shopify;

use Shopify\Exception;
use Shopify\Util;

abstract class AbstractObject extends AbstractResource
{
    public function __construct($data = array())
    {
        foreach($data->shop as $key => $value)
        {
            $this->{$key} = $value;
        }
    }    
}

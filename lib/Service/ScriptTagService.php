<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\ScriptTag;

class ScriptTagService extends AbstractService
{
    public static $className = ScriptTag::class;

    public static $endpoint = 'script_tags';
}

<?php

namespace Shopify\Enum\Fields;

class AbstractObjectEnum
{
    public function getFieldTypes()
    {
        return array();
    }

    public function getFields()
    {
        $enum = $this->getFieldTypes();
        return array_keys($enum);
    }

    public static function getInstance()
    {
        return new static();
    }
}

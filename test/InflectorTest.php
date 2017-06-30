<?php

namespace Shopify\Test;

use Shopify\Test\ShopifyTest;
use Shopify\Inflector;

class InflectorTest extends ShopifyTest
{
    /**
     * @dataProvider pluralizeProvider
     */
    public function testPluralize($input, $expected)
    {
        $output = Inflector::pluralize($input);
        $this->assertEquals($expected, $output);
    }

    /**
     * @dataProvider singularizeProvider
     */
    public function testSingularize($input, $expected)
    {
        $output = Inflector::singularize($input);
        $this->assertEquals($expected, $output);
    }

    /**
     * @dataProvider snakeToPascalProvider
     */
    public function testSnakeToPascal($input, $expected)
    {
        $output = Inflector::snakeToPascal($input);
        $this->assertEquals($expected, $output);
    }

    public function snakeToPascalProvider()
    {
        return [
            ['api_key', 'ApiKey'],
            ['redirect_uri', 'RedirectUri']
        ];
    }

    public function singularizeProvider()
    {
        return [
            ['users', 'user'],
            ['policies', 'policy'],
            ['countries', 'country']
        ];
    }

    public function pluralizeProvider()
    {
        return [
            ['user', 'users'],
            ['policy', 'policies'],
            ['country', 'countries']
        ];
    }
}

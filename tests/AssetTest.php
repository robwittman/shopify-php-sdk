<?php

namespace Shopify;

use Shopify\ArticleFields;
use Shopify\Exception;

class AssetTest extends TestCase
{
    public function testAssetIndex()
    {
        $assets = Asset::all(1234123);
        $this->assertInstanceOf('\Shopify\Asset', $assets[0]);
    }

    public function testAssetGet()
    {
        $asset = Asset::get('assets/new_bg.gif', 1234123);
        $this->assertInstanceOf('\Shopify\Asset', $asset);
    }

    public function testAssetCreate()
    {
        $asset = new Asset([
            'theme_id' => 1231423,
            'key' => 'assets/new_bg.gif',
        ]);
        $asset->create();
    }

    public function testAssetUpdate()
    {
        $asset = Asset::get('assets/new_bg.gif', 12341234);
        $asset->key = 'assets/new_bg.gif';
        $asset->update();
        $this->assertEquals($asset->key, 'assets/new_bg.gif');
    }

    public function testAssetDelete()
    {
        (new Asset([
            'key' => 'assets/bg_body.gif',
            'theme_id' => 1234123
        ]))->delete();
    }

    /**
     * @expectedException \Shopify\Exception\ApiException
     */
    public function testCreateAssetWithoutKeyField()
    {
        $asset = new Asset([
            'theme_id' => 12341234,
            'src' => 'http://google.com'
        ]);
        $asset->create();
    }
}

<?php

namespace Shopify;

class ThemeTest extends TestCase
{
    public function testListThemes()
    {
        $themes = Theme::all();
        $this->assertInstanceOf('\Shopify\Theme', $themes[0]);
    }

    public function testFetchTheme()
    {
        $theme = Theme::get(1234123);
        $this->assertInstanceOf('\Shopify\Theme', $theme);
    }

    public function testCreateTheme()
    {
        $theme = new Theme([
            'name' => 'test',
            'role' => 'main'
        ]);
        $theme->create();
        $this->assertNotNull($theme->id);
    }

    public function testUpdateTheme()
    {
        $theme = Theme::get(123413);
        $theme->role = 'test';
        $theme->update();
        $this->assertEquals($theme->role, 'test');
    }

    public function testDeleteTheme()
    {
        $theme = (new Theme([
            'id' => 1234123
        ]))->delete();
    }

    public function testThemeGetAssets()
    {
        $assets = (new Theme([
            'id' => 1234132
        ]))->getAssets();
        $this->assertInstanceOf('\Shopify\Asset', $assets[0]);
    }
}

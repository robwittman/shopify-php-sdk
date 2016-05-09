<?php

namespace Shopify;

class ScriptTagTest extends TestCase
{
    public function testScriptTagList()
    {
        $tags = ScriptTag::all();
        $this->assertInstanceOf('\Shopify\ScriptTag', $tags[0]);
    }

    public function testGetScriptTag()
    {
        $tag = ScriptTag::get(12341);
        $this->assertInstanceOf('\Shopify\ScriptTag', $tag);
    }

    public function testCountScriptTags()
    {
        $count = ScriptTag::count();
        $this->assertInternalType("int", $count);
    }

    public function testCreateScriptTag()
    {
        $tag = new ScriptTag([
            'src' => 'http://domain.com/script.js',
            'event' => 'inload'
        ]);
        $tag->create();
        $this->assertNotNull($tag->id);
    }

    public function testUpdateScriptTag()
    {
        $tag = ScriptTag::get(12341);
        $tag->src = 'http://new_domain.com/script.js';
        $tag->update();
        $this->assertEquals($tag->src, 'http://new_domain.com/script.js');
    }

    public function testDeleteScriptTag()
    {
        (new ScriptTag([
            'id' => 1234123
        ]))->delete();
    }
}

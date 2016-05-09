<?php

namespace Shopify;

class PageTest extends TestCase
{
    public function testPagesIndex()
    {
        $list = Page::all();
        $this->assertInstanceOf('\Shopify\Page', $list[0]);
    }

    public function testPagesGet()
    {
        $obj = Page::get(1234);
        $this->assertInstanceOf('\Shopify\Page', $obj);
    }

    public function testPagesCount()
    {
        $count = Page::count();
        $this->assertInternalType("int", $count);
    }

    public function testPagesCreate()
    {
        $page = new Page([
            'author' => "ya boi"
        ]);
        $page->create();
        $this->assertNotNull($page->id);
    }

    public function testPagesUpdate()
    {
        $page = Page::get(12341);
        $page->author = 'New author';
        $page->update();
        $this->assertEquals($page->author, 'New author');
    }

    public function testPagesDelete()
    {
        (new Page([
            'id' => 1234123
        ]))->delete();
    }
}

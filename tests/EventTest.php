<?php

namespace Shopify;

class EventTest extends TestCase
{
    public function testEventsIndex()
    {
        $events = Event::all();
        $this->assertInstanceOf('\Shopify\Event', $events[0]);
    }

    public function testGetEvent()
    {
        $event = Event::get(12341);
        $this->assertInstanceOf('\Shopify\Event', $event);
    }

    public function testEventsCount()
    {
        $count = Event::count();
        $this->assertInternalType("int", $count);
    }
}

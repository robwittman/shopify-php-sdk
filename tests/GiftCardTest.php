<?php

namespace Shopify;

class GiftCardTest extends TestCase
{
    public function testGiftCardIndex()
    {
        $cards = GiftCard::all();
        $this->assertInstanceOf('\Shopify\GiftCard', $cards[0]);
    }

    public function testGetGiftCard()
    {
        $card = GiftCard::get(1234123);
        $this->assertInstanceOf('\Shopify\GiftCard', $card);
    }

    public function testCountGiftCards()
    {
        $count = GiftCard::count();
        $this->assertInternalType("int", $count);
    }

    public function testCreateGiftCard()
    {
        $card = new GiftCard([
            'note' => "This is a note",
            'initial_value' => 100.00,
        ]);
        $card->create();
        $this->assertNotNull($card->id);
    }

    public function testUpdateGiftCard()
    {
        $card = GiftCard::get(12341);
        $card->note = 'This is a note';
        $card->update();
        $this->assertEquals($card->note, "This is a note");
    }

    public function testDisableGiftCard()
    {
        $card = GiftCard::get(1234);
        $card->disable();
    }
}

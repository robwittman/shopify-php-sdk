<?php

namespace Shopify\Service;

use Shopify\Object\GiftCard;

class GiftCardService extends AbstractService
{
    /**
     * Receive a list of Gift Cards
     *
     * @link   https://help.shopify.com/api/reference/gift_card#index
     * @param  array $params
     * @return GiftCard[]
     */
    public function all(array $params = [])
    {
        $endpoint = 'gift_cards.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(GiftCard::class, $response['gift_cards']);
    }

    /**
     * Receive a count of Gift Cards
     *
     * @link   https://help.shopify.com/api/reference/gift_card#count
     * @param  array $params
     * @return integer
     */
    public function count(array $params = [])
    {
        $endpoint = 'gift_cards/count.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $response['count'];
    }

    /**
     * Receive a single Gift Card
     *
     * @link   https://help.shopify.com/api/reference/gift_card#show
     * @param  integer $giftCardId
     * @param  array   $params
     * @return GiftCard
     */
    public function get($giftCardId, array $params = [])
    {
        $endpoint = 'gift_cards/'.$giftCardId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(GiftCard::class, $response['gift_card']);
    }

    /**
     * Create a gift card
     *
     * @link   https://help.shopify.com/api/reference/gift_card#create
     * @param  GiftCard $giftCard
     * @return void
     */
    public function create(GiftCard &$giftCard)
    {
        $data = $giftCard->exportData();
        $endpoint = 'gift_cards.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'gift_card' => $data
            )
        );
        $giftCard->setData($response['gift_card']);
    }

    /**
     * Update a Gift Card
     *
     * @link   https://help.shopify.com/api/reference/gift_card#update
     * @param  GiftCard $giftCard
     * @return void
     */
    public function update(GiftCard &$giftCard)
    {
        $data = $giftCard->exportData();
        $endpoint = 'gift_cards/'.$giftCard->id.'.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'gift_card' => $data
            )
        );
        $giftCard->setData($response['gift_card']);
    }

    /**
     * Disable a Gift Card
     *
     * @link   https://help.shopify.com/api/reference/gift_card#disable
     * @param  GiftCard $giftCard
     * @return void
     */
    public function disable(GiftCard &$giftCard)
    {
        $endpoint = 'gift_cards/'.$giftCard->id.'/disable.json';
        $response = $this->request($endpoint, 'POST');
        $giftCard->setData($response['gift_card']);
    }

    /**
     * Search for gift cards matching supplied query
     *
     * @link   https://help.shopify.com/api/reference/gift_card#search
     * @param  array $params
     * @return GiftCard[]
     */
    public function search(array $params = [])
    {
        $endpoint = 'gift_cards/search.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(GiftCard::class, $response['gift_cards']);
    }
}

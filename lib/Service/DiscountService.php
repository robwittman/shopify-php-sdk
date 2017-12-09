<?php

namespace Shopify\Service;

use Shopify\Object\Discount;

class DiscountService extends AbstractService
{
    /**
     * Receive a list of all discounts
     *
     * @link   https://help.shopify.com/api/reference/discount#index
     * @param  array $params
     * @return Discount[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/admin/discounts.json';
        $request = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Discount::class, $response['discounts']);
    }

    /**
     * Receive a single discount
     *
     * @link   https://help.shopify.com/api/reference/discount#show
     * @param  integer $discountId
     * @return Discount
     */
    public function get($discountId)
    {
        $endpoint = '/admin/discounts/'.$discountId.'.json';
        $response = $this->request($endpoint);
        return $this->createObject(Discount::class, $response['discount']);
    }

    /**
     * Create a new discount
     *
     * @link   https://help.shopify.com/api/reference/discount#create
     * @param  Discount $discount
     * @return void
     */
    public function create(Discount &$discount)
    {
        $data = $discount->exportData();
        $endpoint = '/admin/discounts.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'product' => $data
            )
        );
        $discount->setData($response['discount']);
    }

    /**
     * Delete a discount
     *
     * @link   https://help.shopify.com/api/reference/discount#destroy
     * @param  Discount $discount
     * @return void
     */
    public function delete(Discount $discount)
    {
        $endpoint = '/admin/discounts/'.$discount->id.'.json';
        $this->request($endpoint, 'DELETE');
        return;
    }

    /**
     * Disable a discount
     *
     * @link   https://help.shopify.com/api/reference/discount#disable
     * @param  Discount $discount
     * @return void
     */
    public function disable(Discount &$discount)
    {
        $endpoint = '/admin/discounts/'.$discount->id.'/disable.json';
        $response = $this->request($endpoint, 'POST');
        $discount->setData($response['discount']);
    }

    /**
     * Enable a discount
     *
     * @link   https://help.shopify.com/api/reference/discount#enable
     * @param  Discount $discount
     * @return void
     */
    public function enable(Discount $discount)
    {
        $endpoint = '/admin/discounts/'.$discount->id.'/enable.json';
        $response = $this->request($endpoint, 'POST');
        $discount->setData($response['discount']);
    }
}

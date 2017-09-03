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
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $params, Discount::class);
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
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, array(), Discount::class);
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
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send(
            $request, array(
            'discount' => $data
            )
        );
        $discount->setData($response->discount);
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
        $endpoint = '/admin/discounts/'.$discount->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_DELETE);
        $response = $this->send($request);
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
        $endpoint = '/admin/discounts/'.$discount->getId().'/disable.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request);
        $discount->setData($response->discount);
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
        $endpoint = '/admin/discounts/'.$discount->getId().'/enable.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request);
        $discount->setData($response->discount);
    }
}

<?php

namespace Shopify\Service;

use Shopify\Object\DiscountCode;

class DiscountCodeService extends AbstractService
{
    /**
     * Receive a list of all discounts
     *
     * @link   https://help.shopify.com/api/reference/discount#index
     * @param  integer $priceRuleId
     * @param  array $params
     * @return DiscountCode[]
     */
    public function all($priceRuleId, array $params = array())
    {
        $endpoint = '/admin/price_rules/'.$priceRuleId.'/discount_codes.json';
        $request = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(DiscountCode::class, $response['discount_codes']);
    }

    /**
     * Receive a single discount
     *
     * @link   https://help.shopify.com/api/reference/discount#show
     * @param  integer $priceRuleId
     * @param  integer $discountCodeId
     * @return DiscountCode
     */
    public function get($priceRuleId, $discountCodeId)
    {
        $endpoint = '/admin/price_rules/'.$priceRuleId.'/discount_codes/'.$discountCodeId.'.json';
        $response = $this->request($endpoint);
        return $this->createObject(DiscountCode::class, $response['discount_code']);
    }

    /**
     * Create a new discount
     *
     * @link   https://help.shopify.com/api/reference/discount#create
     * @param  integer $priceRuleId
     * @param  DiscountCode $discountCode
     * @return void
     */
    public function create($priceRuleId, DiscountCode &$discountCode)
    {
        $data = $discountCode->exportData();
        $endpoint = '/admin/price_rules/'.$priceRuleId.'/discount_codes.json';
        $response = $this->request($endpoint, 'POST', array(
            'discount_code' => $data
        ));
        $discountCode->setData($response['discount_code']);
    }

    /**
     * Delete a discount
     *
     * @link   https://help.shopify.com/api/reference/discount#destroy
     * @param  integer $priceRuleId
     * @param  DiscountCode $discountCode
     * @return void
     */
    public function delete($priceRuleId, DiscountCode $discountCode)
    {
        $endpoint = '/admin/price_rules/'.$priceRuleId.'/discount_codes/'.$discountCode->id.'.json';
        $this->request($endpoint, 'DELETE');
        return;
    }

    /**
     * Update a Discount Code
     * @param  integer       $priceRuleId
     * @param  DiscountCode $discountCode
     * @return void
     */
    public function update($priceRuleId, DiscountCode &$discountCode)
    {
        $data = $discountCode->exportData();
        $endpoint = '/admin/price_rules/'.$priceRuleId.'/discount_codes/'.$discountCode->id.'.json';
        $response = $this->request($endpoint, 'PUT', array(
            'discount_code' => $data
        ));
        $discountCode->setData($response['discount_code']);
    }
}

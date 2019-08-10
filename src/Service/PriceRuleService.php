<?php

namespace Shopify\Service;

use Shopify\Object\PriceRule;

class PriceRuleService extends AbstractService
{
    public function all(array $params = array())
    {
        $endpoint = '/price_rules.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(PriceRule::class, $response['price_rules']);
    }

    public function get($priceRuleId, array $fields = array())
    {
        $params = array();
        if (!empty($fields)) {
            $params['fields'] = $fields;
        }
        $endpoint = '/price_rules/'.$priceRuleId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(PriceRule::class, $response['price_rule']);
    }

    public function create(PriceRule &$priceRule)
    {
        $data = $priceRule->exportData();
        $endpoint = '/price_rules.json';
        $response = $this->request(
            $endpoint,
            'POST',
            array('price_rule' => $data)
        );
        $priceRule->setData($response['price_rule']);
    }

    public function update(PriceRule &$priceRule)
    {
        $data = $priceRule->exportData();
        $endpoint = '/price_rules/'.$priceRule->id.'.json';
        $response = $this->request(
            $endpoint, 'PUT', array(
                'price_rule' => $data
            )
        );
        $priceRule->setData($response['price_rule']);
    }

    public function delete(PriceRule $priceRule)
    {
        $endpoint = '/price_rules/'.$priceRule->id.'.json';
        $this->request($endpoint, 'DELETE');
    }
}

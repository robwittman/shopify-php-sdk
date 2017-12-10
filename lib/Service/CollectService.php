<?php

namespace Shopify\Service;

use Shopify\Object\Collect;

class CollectService extends AbstractService
{
    /**
     * Receive a list of all collects
     *
     * @link   https://help.shopify.com/api/reference/collect#index
     * @param  array $params
     * @return Collect[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/admin/collects.json';
        $data = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Collect::class, $data['collects']);
    }

    /**
     * Receive a count of all collects
     *
     * @link   https://help.shopify.com/api/reference/collect#count
     * @param  array $params
     * @return integer
     */
    public function count(array $params = array())
    {
        $endpoint = '/admin/collects/count.json';
        $data = $this->request($endpoint);
        return $data['count'];
    }

    /**
     * Receive a single collect
     *
     * @link   https://help.shopify.com/api/reference/collect#show
     * @param  integer $collectId
     * @param  array   $fields
     * @return Collect
     */
    public function get($collectId, array $fields = array())
    {
        $params = array();
        if (!empty($fields)) {
            $params['fields'] = implode(',', $fields);
        }
        $endpoint = '/admin/collects/'.$collectId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(Collect::class, $response['collect']);
    }

    /**
     * Create a new collect
     *
     * @link   https://help.shopify.com/api/reference/collect#create
     * @param  Collect $collect
     * @return void
     */
    public function create(Collect &$collect)
    {
        $data = $collect->exportData();
        $endpoint = '/admin/collects.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'collect' => $data
            )
        );
        $collect->setData($response['collect']);
    }

    /**
     * Remove a collect from the database
     *
     * @link   https://help.shopify.com/api/reference/collect#destroy
     * @param  Collect $collect
     * @return void
     */
    public function delete(Collect &$collect)
    {
        $endpoint = '/admin/collects/'.$collect->getId().'.json';
        $this->request($endpoint, 'DELETE');
        return;
    }
}

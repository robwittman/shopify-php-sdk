<?php

namespace Shopify\Service;

use Shopify\Object\Metafield;

class MetafieldService extends AbstractService
{
    /**
     * Retrieve a list of metafields that belong to a resource
     *
     * @link   https://help.shopify.com/api/reference/metafield#index
     * @param array $params
     * @param string $ownerResource
     * @param string $ownerId
     * @return Metafield[]
     */
    public function all(array $params = array(), $ownerResource = '', $ownerId = '')
    {
        if ($ownerResource && $ownerId) {
            $endpoint = 'admin/' . $ownerResource . '/' . $ownerId . '/metafields.json';
        } else {
            $endpoint = 'admin/metafields.json';
        }
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Metafield::class, $response['metafields']);
    }
    /**
     * Receive a count of all metafields
     *
     * @link   https://help.shopify.com/api/reference/metafield#count
     * @param  array $params
     * @return integer
     */
    public function count(array $params = array())
    {
        $endpoint = 'admin/metafields/count.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $response['count'];
    }
    /**
     * Receive a single metafield
     *
     * @link   https://help.shopify.com/api/reference/metafield#show
     * @param  integer $metafieldId
     * @param  array   $fields
     * @return Metafield
     */
    public function get($metafieldId, array $fields = array())
    {
        $params = array();
        if (!empty($fields)) {
            $params['fields'] = $fields;
        }
        $endpoint = 'admin/metafields/'.$metafieldId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(Metafield::class, $response['metafield']);
    }
    /**
     * Create a new metafield for a resource
     *
     * @link   https://help.shopify.com/api/reference/metafield#create
     * @param  Metafield $metafield
     * @param string $ownerResource
     * @param string $ownerId
     * @return void
     */
    public function create(Metafield &$metafield, $ownerResource = '', $ownerId = '')
    {
        $data = $metafield->exportData();
        if ($ownerResource && $ownerId) {
            $endpoint = 'admin/' . $ownerResource . '/' . $ownerId . '/metafields.json';
        } else {
            $endpoint = 'admin/metafields.json';
        }
        $response = $this->request(
            $endpoint, 'POST', array(
                'metafield' => $data
            )
        );
        $metafield->setData($response['metafield']);
    }
    /**
     * Modify an existing metafield
     *
     * @link   https://help.shopify.com/api/reference/metafield#update
     * @param  Metafield $metafield
     * @return void
     */
    public function update(Metafield &$metafield)
    {
        $data = $metafield->exportData();
        $endpoint = 'admin/metafields/'.$metafield->id.'.json';
        $response = $this->request(
            $endpoint, 'PUT', array(
                'metafield' => $data
            )
        );
        $metafield->setData($response['metafield']);
    }
    /**
     * Remove a metafield
     *
     * @link   https://help.shopify.com/api/reference/metafield#destroy
     * @param  Metafield $metafield
     * @return void
     */
    public function delete(Metafield &$metafield)
    {
        $endpoint = 'admin/metafields/'.$metafield->id.'.json';
        $this->request($endpoint, 'DELETE');
    }
}

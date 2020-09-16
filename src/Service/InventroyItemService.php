<?php

namespace Shopify\Service;

use Shopify\Object\InventoryItem;

class InventroyItemService extends AbstractService
{
    /**
     * Retrieves a list of inventory items.
     * Note: As of version 2019-10, this endpoint implements pagination by using links that are provided in the response header.
     * Sending the page parameter will return an error.
     * To learn more, see Making requests to paginated REST Admin API endpoints.
     *
     * @link https://shopify.dev/docs/admin-api/rest/reference/inventory/inventoryitem#index-2020-07
     * @param array $params
     * @return InventoryItem[]
     */
    public function all(array $params = []){
        $endpoint = 'inventory_items.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(InventoryItem::class, $response['products']);
    }

    /**
     * Retrieves a single inventory item by ID
     *
     * @link https://shopify.dev/docs/admin-api/rest/reference/inventory/inventoryitem#show-2020-07
     * @param int $inventroyItemId
     * @param array $fields
     * @return InventoryItem[]
     */
    public function get(int $inventroyItemId, array $fields = []){
        $params = [];
        if (!empty($fields)) {
            $params['fields'] = $fields;
        }
        $endpoint = 'inventory_items/'.$inventroyItemId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(InventoryItem::class, $response['product']);
    }

    /**
     * Updates an existing inventory item
     *
     * @link https://shopify.dev/docs/admin-api/rest/reference/inventory/inventoryitem#update-2020-07
     * @param InventoryItem $inventoryItem
     * @return void
     */
    public function update(InventoryItem &$inventoryItem){
        $data = $inventoryItem->exportData();
        $endpoint = 'inventory_items/'.$inventoryItem->id.'.json';
        $response = $this->request(
            $endpoint, 'PUT', array(
            'inventory_item' => $data
            )
        );
        $inventoryItem->setData($response['product']);
    }
}
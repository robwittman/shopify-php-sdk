<?php

namespace Shopify\Service;

use Shopify\Object\InventoryLevel;

class InventoryLevelService extends AbstractService
{
    /**
     * Retrieves a list of inventory levels.
     * You must include inventory_item_ids and/or location_ids as filter params.
     *
     * @link   https://help.shopify.com/api/reference/inventorylevel#index
     * @param  array $params
     * @return InventoryLevel[]
     */
    public function all(array $params)
    {
        $endpoint = '/admin/inventory_levels.json';
        $response = $this->request($endpoint, 'GET', $params);

        return $this->createCollection(InventoryLevel::class, $response['inventory_levels']);
    }
}

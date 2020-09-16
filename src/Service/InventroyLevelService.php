<?php

namespace Shopify\Service;

use InvalidArgumentException;
use Shopify\Object\InventoryLevel;

class InventroyLevelService extends AbstractService
{
    /**
     * Retrieves a list of inventory levels.
     * You must include inventory_item_ids, location_ids, or both as filter parameters.
     * 
     * Note: As of version 2019-10, this endpoint implements pagination by using links that are provided in the response header.
     * Sending the page parameter will return an error. To learn more, see Making requests to paginated REST Admin API endpoints.
     *
     * @param array $inventoryItemIds leave emptry if you to see the level of all items at a location
     * @param array $locationIds leave empty if you want to see the item levels at all locations
     * 
     * @return InventoryLevel[]
     */
    public function get(array $inventoryItemIds = [], array $locationIds = []){
        //Set the eandpoint to inventory_levels.
        $endpoint = 'inventory_levels.json?';

        //First we check what we want to check if there are empty arrays.
        //If the $inventoryItemIds is not empty but $locationIds is.
        //We need this $endpoint
        if(!empty($inventoryItemIds) && empty($locationIds)){
            $endpoint = $endpoint.'inventory_item_ids='.implode(",", $inventoryItemIds);
        }
        //Else the $locationIds is not empty but the $inventoryItemIds is empty.
        //We need to use this $endpoint
        elseif(!empty($locationIds) && empty($inventoryItemIds)){
            $endpoint = $endpoint.'location_ids='.implode(",", $locationIds);
        }
        //Else both $inventoryItemIds and $locationIds are not empty.
        //We need to use this $endpoint
        elseif(!empty($inventoryItemIds) && !empty($locationIds)){
            $endpoint = $endpoint.'inventory_item_ids='.implode(",", $inventoryItemIds).'&location_ids='.implode(",", $locationIds);
        }
        //Else both arrays are empty.
        //throw an InvalidArgumentException.
        else{
            throw new InvalidArgumentException();
        }

        //Get the response
        $response = $this->request($endpoint);

        return $$this->createCollection(InventoryLevel::class, $response['inventory_levels']);
    }

    /**
     * Adjusts the inventory level of an inventory item at a single location
     *
     * @link https://shopify.dev/docs/admin-api/rest/reference/inventory/inventorylevel#adjust-2020-07
     * @param InventoryLevel $inventoryLevel
     * @return void
     */
    public function adjust(InventoryLevel &$inventoryLevel){
        $data = $inventoryLevel->exportData();
        $endpoint = 'inventory_levels/adjust.json';
        $response = $this->request(
            $endpoint, 'POST', $data
        );
        $inventoryLevel->setData($response['inventory_level']);
    }

    /**
     * Deletes an inventory level of an inventory item at a location.
     * Deleting an inventory level for an inventory item removes that item from the specified location.
     * Every inventory item must have at least one inventory level.
     * To move inventory to another location, first connect the inventory item to another location, and then delete the previous inventory level.
     *
     * @link https://shopify.dev/docs/admin-api/rest/reference/inventory/inventorylevel#destroy-2020-07
     * @param InventoryLevel $inventoryLevel
     * @return void
     */
    public function delete(InventoryLevel &$inventoryLevel){
        $endpoint = 'inventory_levels.json?inventory_item_id='.$inventoryLevel->inventory_item_id.'&location_id='.$inventoryLevel->location_id;
        $this->request($endpoint, 'DELETE');
        return;
    }

    /**
     * Connects an inventory item to a location by creating an inventory level at that location.
     * When connecting inventory items to locations, it's important to understand the rules around fulfillment service locations.
     *
     * @link https://shopify.dev/docs/admin-api/rest/reference/inventory/inventorylevel#connect-2020-07
     * @param InventoryLevel $inventoryLevel
     * @return void
     */
    public function connect(InventoryLevel &$inventoryLevel){
        $data = $inventoryLevel->exportData();
        $endpoint = 'inventory_levels/connect.json';
        $response = $this->request(
            $endpoint, 'POST', $data
        );
        $inventoryLevel->setData($response['inventory_level']);
    }

    /**
     * Sets the inventory level for an inventory item at a location.
     * If the specified location is not connected, it will be automatically connected first.
     * When connecting inventory items to locations, it's important to understand the rules around fulfillment service locations.
     *
     * @link https://shopify.dev/docs/admin-api/rest/reference/inventory/inventorylevel#set-2020-07
     * @param InventoryLevel $inventoryLevel
     * @return void
     */
    public function set(InventoryLevel &$inventoryLevel){
        $data = $inventoryLevel->exportData();
        $endpoint = 'inventory_levels/set.json';
        $response = $this->request(
            $endpoint, 'POST', $data
        );
        $inventoryLevel->setData($response['inventory_level']);
    }
}
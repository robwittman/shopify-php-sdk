<?php

namespace Shopify\Service;

use Shopify\Object\Order;

class OrderService extends AbstractService
{
    /**
     * Retrieve a list of Orders (OPEN Orders by default, use status=any for ALL orders)
     *
     * @link   https://help.shopify.com/api/reference/order#index
     * @param  array $params
     * @return Order[]
     */
    public function all(array $params = [])
    {
        $endpoint = 'orders.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Order::class, $response['orders']);
    }

    /**
     * Receive a count of all Orders
     *
     * @link   https://help.shopify.com/api/reference/order#show
     * @param  array $params
     * @return integer
     */
    public function count(array $params = [])
    {
        $endpoint = 'orders/count.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $response['count'];
    }

    /**
     * Receive a single Order
     *
     * @link   https://help.shopify.com/api/reference/order#count
     * @param  integer $orderId
     * @param  array   $params
     * @return Order
     */
    public function get($orderId, array $params = [])
    {
        $endpoint = 'orders/'.$orderId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(Order::class, $response['order']);
    }

    /**
     * Create a new order
     *
     * @link   https://help.shopify.com/api/reference/order#create
     * @param  Order $order
     * @return void
     */
    public function create(Order &$order)
    {
        $data = $order->exportData();
        $endpoint = 'orders.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'order' => $data
            )
        );
        $order->setData($response['order']);
    }

    /**
     * Close an Order
     *
     * @link   https://help.shopify.com/api/reference/order#close
     * @param  Order $order
     * @return void
     */
    public function close(Order &$order)
    {
        $endpoint = 'orders/'.$order->id.'/close.json';
        $response = $this->request($endpoint, 'POST');
        $order->setData($response['order']);
    }

    /**
     * Re-open a closed Order
     *
     * @link   https://help.shopify.com/api/reference/order#open
     * @param  Order $order
     * @return void
     */
    public function open(Order &$order)
    {
        $endpoint = 'orders/'.$order->id.'/open.json';
        $response = $this->request($endpoint, 'POST');
        $order->setData($response['order']);
    }

    /**
     * Cancel an Order
     *
     * @link   https://help.shopify.com/api/reference/order#cancel
     * @param  Order $order
     * @return void
     */
    public function cancel(Order &$order)
    {
        $endpoint = '/orders/'.$order->id.'/cancel.json';
        $response = $this->request($endpoint, 'POST');
        $order->setData($response['order']);
    }

    /**
     * Modify anexisting order
     *
     * @link   https://help.shopify.com/api/reference/order#update
     * @param  Order $order
     * @return void
     */
    public function update(Order &$order)
    {
        $data = $order->exportData();
        $endpoint = 'orders/'.$order->id.'.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'order' => $data
            )
        );
        $order->setData($response['order']);
    }

    /**
     * Delete an order
     *
     * @link   https://help.shopify.com/api/reference/order#destroy
     * @param  Order $order
     * @return void
     */
    public function delete(Order &$order)
    {
        $endpoint = 'orders/'.$order->id.'.json';
        $this->request($endpoint, 'DELETE');
        return;
    }
}

<?php

namespace Shopify\Service;

use Shopify\Object\Order;

class OrderService extends AbstractService
{
    /**
     * Retrieve a list of Orders (OPEN Orders by default, use status=any for ALL orders)
     * @link https://help.shopify.com/api/reference/order#index
     * @param  array $params
     * @return Order[]
     */
    public function all(array $params = array())
    {
        $endpoint '/admin/orders.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $params, Order::class);
    }

    /**
     * Receive a count of all Orders
     * @link https://help.shopify.com/api/reference/order#show
     * @param  array $params
     * @return integer
     */
    public function count(array $params = array())
    {
        $endpoint = '/admin/orders/cound.json';
        $request = $this->createRequest($endpoint);
        return $this->getCount($request, $options);
    }

    /**
     * Receive a single Order
     * @link https://help.shopify.com/api/reference/order#count
     * @param  integer $orderId
     * @param  array $params
     * @return Order
     */
    public function get($orderId, array $params = array())
    {
        $endpoint = '/admin/orders/'.$orderId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $params, Order::class);
    }

    /**
     * Create a new order
     * @link https://help.shopify.com/api/reference/order#create
     * @param  Order  $order
     * @return void
     */
    public function create(Order &$order)
    {
        $data = $order->exportData();
        $endpoint = '/admin/orders.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'order' => $data
        ));
        $order->setData($response->order);
    }

    /**
     * Close an Order
     * @link https://help.shopify.com/api/reference/order#close
     * @param  Order  $order
     * @return void
     */
    public function close(Order &$order)
    {
        $data = $order->exportData();
        $endpoint= '/admin/orders/'.$order->getId().'/close.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request,array(
            'order' => $data
        ));
        $order->setData($response->order);
    }

    /**
     * Re-open a closed Order
     * @link https://help.shopify.com/api/reference/order#open
     * @param  Order  $order
     * @return void
     */
    public function open(Order &$order)
    {
        $data = $order->exportData();
        $endpoint= '/admin/orders/'.$order->getId().'/open.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request,array(
            'order' => $data
        ));
        $order->setData($response->order);
    }

    /**
     * Cancel an Order
     * @link https://help.shopify.com/api/reference/order#cancel
     * @param  Order  $order
     * @return void
     */
    public function cancel(Order &$order)
    {
        $data = $order->exportData();
        $endpoint= '/admin/orders/'.$order->getId().'/cancel.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request,array(
            'order' => $data
        ));
        $order->setData($response->order);
    }

    /**
     * Modify anexisting order
     * @link https://help.shopify.com/api/reference/order#update
     * @param  Order  $order
     * @return void
     */
    public function update(Order &$order)
    {
        $data = $order->exportData();
        $endpoint= '/admin/orders/'.$order->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request,array(
            'order' => $data
        ));
        $order->setData($response->order);
    }

    /**
     * Delete an order
     * @link https://help.shopify.com/api/reference/order#destroy
     * @param  Order  $order
     * @return void
     */
    public function delete(Order &$order)
    {
        $endpoint= '/admin/orders/'.$order->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_DELETE);
        $this->send($request);
    }
}

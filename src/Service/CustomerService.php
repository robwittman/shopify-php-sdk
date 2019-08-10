<?php

namespace Shopify\Service;

use Shopify\Object\Customer;
use Shopify\Object\CustomerInvite;
class CustomerService extends AbstractService
{
    /**
     * Get all customers
     *
     * @link   https://help.shopify.com/api/reference/customer#index
     * @param  array $params
     * @return Customer[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/customers.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Customer::class, $response['customers']);
    }

    /**
     * Search for customers matching suppliied query
     *
     * @link   https://help.shopify.com/api/reference/customer#search
     * @param  array $params
     * @return Customer[]
     */
    public function search(array $params = array())
    {
        $endpoint = '/customers/search.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Customer::class, $response['customers']);
    }

    /**
     * Receive a count of all customers
     *
     * @link   https://help.shopify.com/api/reference/customer#count
     * @return integer
     */
    public function count()
    {
        $endpoint = '/customers/count.json';
        $response = $this->request($endpoint);
        return $response['count'];
    }

    /**
     * Receive a single customer
     *
     * @link   https://help.shopify.com/api/reference/customer#show
     * @param  integer $customerId
     * @param  array   $params
     * @return Customer
     */
    public function get($customerId, array $params = array())
    {
        $endpoint = '/customers/'.$customerId.'.json';;
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(Customer::class, $response['customer']);
    }

    /**
     * Create a customer
     *
     * @link   https://help.shopify.com/api/reference/customer#create
     * @param  Customer $customer
     * @return void
     */
    public function create(Customer &$customer)
    {
        $data = $customer->exportData();
        $endpoint = '/customers.json';
        $response = $this->request(
            $endpoint, "POST", array(
            'customer' => $data
            )
        );
        $customer->setData($response['customer']);
    }

    /**
     * Update a customer
     *
     * @link   https://help.shopify.com/api/reference/customer#update
     * @param  Customer $customer
     * @return void
     */
    public function update(Customer &$customer)
    {
        $data = $customer->exportData();
        $endpoint = '/customers/'.$customer->id.'.json';
        $response = $this->request(
            $endpoint, 'PUT', array(
            'customer' => $data
            )
        );
        $customer->setData($response['customer']);
    }

    /**
     * Delete a customer
     *
     * @link   https://help.shopify.com/api/reference/customer#destroy
     * @param  Customer $customer
     * @return void
     */
    public function delete(Customer $customer)
    {
        $endpoint = '/customers/'.$customer->id.'.json';
        $this->request($endpoint, 'DELETE');
        return;
    }

    /**
     * Create account activation URL
     *
     * @link   https://help.shopify.com/api/reference/customer#account_activation_url
     * @param  integer $customerId
     * @return string
     */
    public function accountActivationUrl($customerId)
    {
        $endpoint = '/customers/'.$customerId.'/account_activation_url.json';
        $response = $this->request($endpoint, 'POST');
        return $response['account_activation_url'];
    }

    /**
     * Send an invite
     *
     * @todo   Return CustomInvite, instead of raw object
     * @link   https://help.shopify.com/api/reference/customer#send_invite
     * @param  integer $customerId
     * @param CustomerInvite $invite
     * @return CustomerInvite
     */
    public function sendInvite($customerId, CustomerInvite $invite = null)
    {
        $data = is_null($invite) ? array() : $invite->exportData();
        $endpoint = '/customers/'.$customerId.'/send_invite.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'custom_invite' => $data
            )
        );
        return $response['customer_invite'];
    }
}

<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Customer;
use Shopify\Object\CustomerInvite;
use Shopify\Options\Customer\GetOptions;
use Shopify\Options\Customer\ListOptions;
use Shopify\Options\Customer\SearchOptions;

class CustomerService extends AbstractService
{
    /**
     * Get all customers
     * @link https://help.shopify.com/api/reference/customer#index
     * @param  ListOptions $options
     * @return Customer[]
     */
    public function all(ListOptions $options = null)
    {
        $endpoint = '/admin/customers.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $options, Customer::class);
    }

    /**
     * Search for customers matching suppliied query
     * @link https://help.shopify.com/api/reference/customer#search
     * @param  SearchOptions $options
     * @return Customer[]
     */
    public function search(SearchOptions $options = null)
    {
        $endpoint = '/admin/customers/search.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $options, Customer::class);
    }

    /**
     * Receive a count of all customers
     * @link https://help.shopify.com/api/reference/customer#count
     * @return integer
     */
    public function count()
    {
        $endpoint = '/admin/customers/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getCount($request);
    }

    /**
     * Receive a single customer
     * @link https://help.shopify.com/api/reference/customer#show
     * @param  integer $customerId
     * @param  GetOptions $options
     * @return Customer
     */
    public function get($customerId, GetOptions $options = null)
    {
        $endpoint = '/admin/customers/'.$customerId.'.json';;
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $options, Customer::class);
    }

    /**
     * Create a customer
     * @link https://help.shopify.com/api/reference/customer#create
     * @param  Customer $customer
     * @return void
     */
    public function create(Customer &$customer)
    {
        $data = $customer->exportData();
        $endpoint = '/admin/customers.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'customer' => $data
        ));
        $customer->setData($response->customer);
    }

    /**
     * Update a customer
     * @link https://help.shopify.com/api/reference/customer#update
     * @param  Customer $customer
     * @return void
     */
    public function update(Customer &$customer)
    {
        $data = $customer->exportData();
        $endpoint = '/admin/customers/'.$customer->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_PUT);
        $response = $this->send($request, array(
            'customer' => $data
        ));
        $customer->setData($response->customer);
    }

    /**
     * Delete a customer
     * @link https://help.shopify.com/api/reference/customer#destroy
     * @param  Customer $customer
     * @return void
     */
    public function delete(Customer $customer)
    {
        $endpoint = '/admin/customers/'.$customer->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_DELETE);
        $response = $this->send($request);
    }

    /**
     * Create account activation URL
     * @link https://help.shopify.com/api/reference/customer#account_activation_url
     * @param  integer $customerId
     * @return string
     */
    public function accountActivationUrl($customerId)
    {
        $endpoint = '/admin/customers/'.$customerId.'/account_activation_url.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request);
        return $response->account_activation_url;
    }

    /**
     * Send an invite
     * @todo Return CustomInvite, instead of raw object
     * @link https://help.shopify.com/api/reference/customer#send_invite
     * @param  integer $customerId
     * @return CustomerInvite
     */
    public function sendInvite($customerId, CustomerInvite $invite = null)
    {
        $data = is_null($invite) ? array() : $invite->exportData();
        $endpoint = '/admin/customers/'.$customerId.'/send_invite.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'customer_invite' => $data
        ));
        return $response->customer_invite;
    }
}

<?php

namespace Shopify\Service;

use Shopify\Object\Transaction;

class TransactionService extends AbstractService
{
    /**
     * Recieve a list of all Transactions
     *
     * @link   https://help.shopify.com/api/reference/transaction#index
     * @param  integer $orderId
     * @param  array   $params
     * @return Transaction[]
     */
    public function all($orderId, array $params = array())
    {
        $endpoint = '/admin/orders/'.$orderId.'/transactions.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Transaction::class, $response['transactions']);
    }

    /**
     * Receive a count of all transactions
     *
     * @link   https://help.shopify.com/api/reference/transaction#count
     * @param  integer $orderId
     * @param  array   $params
     * @return integer
     */
    public function count($orderId, array $params = array())
    {
        $endpoint = '/admin/orders/'.$orderId.'/transactions/count.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $response['count'];
    }

    /**
     * Get a single Transaction
     *
     * @link   https://help.shopify.com/api/reference/transaction#show
     * @param  integer $orderId
     * @param  integer $transactionId
     * @param  array   $params
     * @return Transaction
     */
    public function get($orderId, $transactionId, array $params = array())
    {
        $endpoint = '/admin/orders/'.$orderId.'/transactions/'.$transactionId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(Transaction::class, $response['transaction']);
    }

    /**
     * Create a new transaction
     *
     * @link   https://help.shopify.com/api/reference/transaction#create
     * @param  Transaction $transaction
     * @return void
     */
    public function create(Transaction &$transaction)
    {
        $data = $transaction->exportData();
        $endpoint = '/admin/transactions.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'transaction' => $data
            )
        );
        $transaction->setData($response['transaction']);
    }
}

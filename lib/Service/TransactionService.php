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
        $request = $this->createRequest('/admin/orders/'.$orderId.'/transactions.json');
        return $this->getEdge($request, $params, Transaction::class);
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
        $request = $this->createRequest('/admin/orders/'.$orderId.'/transactions/count.json');
        return $this->getCount($request, $options);
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
        $request= $this->createRequest('/admin/orders/'.$orderId.'/transactions/'.$transactionId.'.json');
        return $this->getNode($request, $params, Transaction::class);
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
        $request = $this->createRequest('/admin/transactions.json', static::REQUEST_METHOD_POST);
        $response = $this->send(
            $request, array(
            'transaction' => $data
            )
        );
        $transaction->setData($response->transaction);
    }
}

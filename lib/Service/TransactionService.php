<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Transaction;
use Shopify\Options\Transaction\GetOptions;
use Shopify\Options\Transaction\ListOptions;
use Shopify\Options\Transaction\CountOptions;

class TransactionService extends AbstractService
{
    /**
     * Recieve a list of all Transactions
     * @link https://help.shopify.com/api/reference/transaction#index
     * @param  integer $orderId
     * @param  ListOptions $options
     * @return Transaction[]
     */
    public function all($orderId, ListOptions $options = null)
    {
        $request = $this->createRequest('/admin/orders/'.$orderId.'/transactions.json');
        return $this->getEdge($request, $options, Transaction::class);
    }

    /**
     * Receive a count of all transactions
     * @link https://help.shopify.com/api/reference/transaction#count
     * @param integer $orderId
     * @param  CountOptions $options
     * @return integer
     */
    public function count($orderId, CountOptions $options = null)
    {
        $request = $this->createRequest('/admin/orders/'.$orderId.'/transactions/count.json');
        return $this->getCount($request, $options);
    }

    /**
     * Get a single Transaction
     * @link https://help.shopify.com/api/reference/transaction#show
     * @param  integer $orderId
     * @param  integer $transactionId
     * @param  GetOptions $options
     * @return Transaction
     */
    public function get($orderId, $transactionId, GetOptions $options = null)
    {
        $request= $this->createRequest('/admin/orders/'.$orderId.'/transactions/'.$transactionId.'.json');
        return $this->getNode($request, $options, Transaction::class);
    }

    /**
     * Create a new transaction
     * @link https://help.shopify.com/api/reference/transaction#create
     * @param  Transaction $transaction
     * @return void
     */
    public function create(Transaction &$transaction)
    {
        $data = $transaction->exportData();
        $request = $this->createRequest('/admin/transactions.json', static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'transaction' => $data
        ));
        $transaction->setData($response->transaction);
    }
}

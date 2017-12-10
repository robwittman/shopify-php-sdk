<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Object\Transaction;
use Shopify\Service\TransactionService;

class TransactionServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/TransactionsList.json');
        $service = new TransactionService($api);
        $transactions = $service->all(1);
        $this->assertContainsOnlyInstancesOf(
            Transaction::class,
            $transactions
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/Transaction.json');
        $service = new TransactionService($api);
        $transaction = $service->get(1, 1234);
        $this->assertInstanceOf(Transaction::class, $transaction);
    }
}

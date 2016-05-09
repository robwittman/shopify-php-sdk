<?php

namespace Shopify;

class TransactionTest extends TestCase
{
    public function testListTransactions()
    {
        $transactions = Transaction::all(1234123);
        $this->assertInstanceOf('\Shopify\Transaction', $transactions[0]);
    }

    public function testFetchTransaction()
    {
        $transactions = Transaction::get(12341, 1234123);
        $this->assertInstanceOf('\Shopify\Transaction', $transactions);
    }

    public function testCountTransactions()
    {
        $count = Transaction::count(123412);
        $this->assertInternalType("int", $count);
    }

    public function testCreateTransaction()
    {
        $transaction = new Transaction([
            'order_id' => 1234123,
            'amount' => 100.00
        ]);
        $transaction->create();
        $this->assertNotNull($transaction->id);
    }
}

<?php

namespace Shopify\Enum;

class FinancialStatus
{
    const PENDING = 'pending';
    const AUTHORIZED = 'authorized';
    const PARTIALLY_PAID = 'partially_paid';
    const PAID = 'paid';
    const PARTIALLY_REFUNDED = 'partially_refunded';
    const REFUNDED = 'refunded';
    const VOIDED = 'voided';
}

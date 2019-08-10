<?php

namespace Shopify\Enum;

class FulfillmentEventStatus
{
    const CONFIRMED = 'confirmed';
    const IN_TRANSIT = 'in_transit';
    const OUT_FOR_DELIVERY = 'out_for_delivery';
    const DELIVERED = 'delivered';
    const FAILURE = 'failure';
}

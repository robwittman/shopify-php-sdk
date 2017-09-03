<?php

namespace Shopify\Enum\Fields;

class MarketingEventFields extends AbstractObjectEnum
{
    const REMOTE_ID = 'remote_id';
    const EVENT_TYPE = 'event_type';
    const MARKETING_CHANNEL = 'marketing_channel';
    const PAID = 'paid';
    const REFERRING_DOMAIN = 'referring_domain';
    const BUDGET = 'budget';
    const CURRENCY = 'currency';
    const BUDGET_TYPE = 'budget_type';
    const STARTED_AT = 'started_at';
    const SCHEDULED_TO_END_AT = 'scheduled_to_end_at';
    const ENDED_AT = 'ended_at';
    const UTM_PARAMETERS = 'utm_parameters';
    const DESCRIPTION = 'description';
    const MANAGE_URL = 'manage_url';
    const PREVIEW_URL = 'preview_url';
    const MARKETED_RESOURCES = 'marketed_resources';

    public function getFieldTypes()
    {
        return array(
            'remote_id' => 'string',
            'event_type' => 'string',
            'marketing_channel' => 'string',
            'paid' => 'boolean',
            'referring_domain' => 'string',
            'budget' => 'string',
            'currency' => 'string',
            'budget_type' => 'string',
            'started_at' => "DateTime",
            'scheduled_to_end_at' => 'DateTime',
            'ended_at' => 'DateTime',
            'utm_parameters' => 'object',
            'description' => 'string',
            'manage_url' => 'string',
            'preview_url' => 'string',
            'marketed_resources' => 'array'
        );
    }
}

<?php

namespace Shopify\Service;

use Shopify\Object\MarketingEvent;
use Shopify\Exception\ShopifySdkException;

class MarketingEventService extends AbstractService
{
    /**
     * Receieve a list of all Marketing Events
     *
     * @link   https://help.shopify.com/api/reference/marketing_event#index
     * @param  array $params
     * @return MarketingEvent[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/admin/marketing_events.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(MarketingEvent::class, $response['marketing_events']);
    }

    /**
     * Receive a count of all marketing events
     *
     * @link   https://help.shopify.com/api/reference/marketing_event#count
     * @return integer
     */
    public function count()
    {
        $endpoint = '/admin/marketing_events/count.json';
        $response = $this->request($endpoint);
        return $response['count'];
    }

    /**
     * Receive a single Marketing events
     *
     * @link   https://help.shopify.com/api/reference/marketing_event#shows
     * @param  integer $marketingEventId
     * @return MarketingEvent
     */
    public function get($marketingEventId)
    {
        $endpoint = '/admin/marketing_events/'.$marketingEventId.'.json';
        $response = $this->request($endpoint);
        return $this->createObject(MarketingEvent::class, $response['marketing_event']);
    }

    /**
     * Create a marketing event
     *
     * @link   https://help.shopify.com/api/reference/marketing_event#create
     * @param  MarketingEvent $marketingEvent
     * @return void
     */
    public function create(MarketingEvent &$marketingEvent)
    {
        $data = $marketingEvent->exportData();
        $endpoint = '/admin/marketing_events.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'marketing_event' => $data
            )
        );
        $marketingEvent->setData($response['marketing_event']);
    }

    /**
     * Modify a marketing events
     *
     * @link   https://help.shopify.com/api/reference/marketing_event#update
     * @param  MarketingEvent $marketingEvent
     * @return void
     */
    public function update(MarketingEvent &$marketingEvent)
    {
        $data = $marketingEvent->exportData();
        $endpoint = '/admin/marketing_events/'.$marketingEvent->id.'.json';
        $response = $this->request(
            $endpoint, 'PUT', array(
            'marketing_event' => $data
            )
        );
        $marketingEvent->setData($response['marketing_event']);
    }

    /**
     * Remove a marketing event
     *
     * @link   https://help.shopify.com/api/reference/marketing_event#destroy
     * @param  MarketingEvent $marketingEvent
     * @return void
     */
    public function delete(MarketingEvent &$marketingEvent)
    {
        $endpoint = '/admin/marketing_events/'.$marketingEvent->id.'.json';
        $response = $this->request($endpoint, 'DELETE');
        return;
    }

    /**
     * Create marketing engagements on a marketing events
     *
     * @link   https://help.shopify.com/api/reference/marketing_event#engagements
     * @param  MarketingEvent $marketingEvent
     * @return void
     */
    public function createEngagements(MarketingEvent $marketingEvent)
    {
        throw new ShopifySdkException('MarketingEventService::createEngagements() not implemented');
    }
}

<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\MarketingEvent;
use Shopify\Options\MarketingEvent\ListOptions;

class MarketingEventService extends AbstractService
{
    /**
     * Receieve a list of all Marketing Events
     * @link https://help.shopify.com/api/reference/marketing_event#index
     * @param  ListOptions $options
     * @return MarketingEvent[]
     */
    public function all(ListOptions $options = null)
    {
        $endpoint = '/admin/marketing_events.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $options, MarketingEvent::class);
    }

    /**
     * Receive a count of all marketing events
     * @link https://help.shopify.com/api/reference/marketing_event#count
     * @return integer
     */
    public function count()
    {
        $endpoint = '/admin/marketing_events/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getCount($request);
    }

    /**
     * Receive a single Marketing events
     * @link https://help.shopify.com/api/reference/marketing_event#shows
     * @param  integer $marketingEventId
     * @return MarketingEvent
     */
    public function get($marketingEventId)
    {
        $endpoint = '/admin/marketing_events/'.$marketingEventId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, null, MarketingEvent::class);
    }

    /**
     * Create a marketing event
     * @link https://help.shopify.com/api/reference/marketing_event#create
     * @param  MarketingEvent $marketingEvent
     * @return void
     */
    public function create(MarketingEvent &$marketingEvent)
    {
        $data = $marketingEvent->exportData();
        $endpoint = '/admin/marketing_events.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'marketing_event' => $data
        ));
        $marketingEvent->setData($response->marketing_event);
    }

    /**
     * Modify a marketing events
     * @link  https://help.shopify.com/api/reference/marketing_event#update
     * @param  MarketingEvent $marketingEvent
     * @return void
     */
    public function update(MarketingEvent &$marketingEvent)
    {
        $data = $marketingEvent->exportData();
        $endpoint = '/admin/marketing_events/'.$markketingEvent->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_PUT);
        $response = $this->send($request, array(
            'marketing_event' => $data
        ));
        $marketingEvent->setData($response->marketing_event);
    }

    /**
     * Remove a marketing event
     * @link https://help.shopify.com/api/reference/marketing_event#destroy
     * @param  MarketingEvent $marketingEvent
     * @return void
     */
    public function delete(MarketingEvent &$marketingEvent)
    {
        $endpoint = '/admin/marketing_events/'.$marketingEvent->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_DELETE);
        $this->send($request);
    }

    /**
     * Create marketing engagements on a marketing events
     * @link https://help.shopify.com/api/reference/marketing_event#engagements
     * @param  MarketingEvent $marketingEvent
     * @return void
     */
    public function createEngagements(MarketingEvent $marketingEvent)
    {

    }
}

<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Event;
use Shopify\Options\Event\GetOptions;
use Shopify\Options\Event\ListOptions;
use Shopify\Options\Event\CountOptions;

class EventService extends AbstractService
{
    /**
     * Get a list of all events
     * @link https://help.shopify.com/api/reference/event#index
     * @param  ListOptions $options
     * @return Event[]
     */
    public function all(ListOptions $options = null)
    {
        $endpoint = '/admin/events.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $options, Event::class);
    }

    /**
     * Get a count of events
     * @link https://help.shopify.com/api/reference/event#count
     * @param  CountOptions $options
     * @return integer
     */
    public function count(CountOptions $options = null)
    {
        $endpoint = '/admin/events/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getCount($request, $options);
    }

    /**
     * Receive a single event
     * @link https://help.shopify.com/api/reference/event#show
     * @param  integer $eventId
     * @param  GetOptions $options
     * @return Event
     */
    public function get($eventId, GetOptions $options = null)
    {
        $endpoint = '/admin/events/'.$eventId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($endpoint, $options, Event::class);
    }
}

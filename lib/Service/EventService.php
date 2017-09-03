<?php

namespace Shopify\Service;

use Shopify\Object\Event;

class EventService extends AbstractService
{
    /**
     * Get a list of all events
     *
     * @link   https://help.shopify.com/api/reference/event#index
     * @param  array $params
     * @return Event[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/admin/events.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $params, Event::class);
    }

    /**
     * Get a count of events
     *
     * @link   https://help.shopify.com/api/reference/event#count
     * @param  array $params
     * @return integer
     */
    public function count(array $params = array())
    {
        $endpoint = '/admin/events/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getCount($request, $options);
    }

    /**
     * Receive a single event
     *
     * @link   https://help.shopify.com/api/reference/event#show
     * @param  integer $eventId
     * @param  array   $params
     * @return Event
     */
    public function get($eventId, array $params = array())
    {
        $endpoint = '/admin/events/'.$eventId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($endpoint, $options, Event::class);
    }
}

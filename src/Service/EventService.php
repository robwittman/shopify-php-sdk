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
        $endpoint = '/events.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Event::class, $response['events']);
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
        $endpoint = '/events/count.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $response['count'];
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
        $endpoint = '/events/'.$eventId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(Event::class, $response['event']);
    }
}

<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Shopify\ApiInterface;
use Shopify\Object\AbstractObject;
use Shopify\Inflector;

abstract class AbstractService
{
    private $api;
    private $mapper;

    const REQUEST_METHOD_GET = 'GET';
    const REQUEST_METHOD_POST = 'POST';
    const REQUEST_METHOD_PUT = 'PUT';
    const REQUEST_METHOD_DELETE = 'DELETE';

    public static function factory(ApiInterface $api)
    {
        return new static($api);
    }

    public function __construct(ApiInterface $api)
    {
        $this->api = $api;
    }

    public function getApi()
    {
        return $this->api;
    }

    public function getCount(Request $request, array $params = array())
    {
        $response = $this->send($request, $params);
        return $this->createObject(null, $data);
    }

    public function getEdge(Request $request, array $params = array(), $className = null)
    {
        $response = $this->send($request, $params);
        $handle = $className::getApiHandle();
        $data = $response->{$handle};
        return $this->createCollection($className, $data);
    }

    public function getNode(Request $request, array $params = array(), $className = null)
    {
        $response = $this->send($request, $params);
        $handle = Inflector::singularize($className::getApiHandle());
        $data = $response->{$handle};
        return $this->createObject($className, $data);
    }

    public function createRequest($endpoint, $method = self::REQUEST_METHOD_GET)
    {
        return new Request($method, $endpoint);
    }

    public function send(Request $request, array $params = array())
    {
        $handler = $this->getApi()->getHttpHandler();
        $args = array();
        if ($request->getMethod() === 'GET') {
            $args['query'] = $params;
        } else {
            $args['json'] = $params;
        }
        $this->lastResponse = $handler->send($request, $args);
        return json_decode($this->lastResponse->getBody()->getContents(), true);
    }

    public function createObject($className, $data)
    {
        $obj = new $className();
        $obj->setData($data);
        return $obj;
    }

    public function createCollection($className, $data)
    {
        return array_map(
            function ($object) use ($className) {
                return $this->createObject($className, $object);
            }, $data
        );
    }
}

<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Shopify\ApiInterface;
use Shopify\Object\AbstractObject;
use Shopify\Inflector;
use JsonMapper;

abstract class AbstractService
{
    private $api;
    private $mapper;

    public static function factory(ApiInterface $api)
    {
        return new static($api);
    }

    public function __construct(ApiInterface $api, $mapper = null)
    {
        $this->api = $api;
        if (is_null($mapper)) {
            $mapper = new JsonMapper();
            $mapper->bStrictNullTypes = false;
        }
        $this->mapper = $mapper;
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
        return json_decode($this->lastResponse->getBody()->getContents());
    }

    public function createObject($className, $data)
    {
        return $this->mapper->map($data, new $className());
    }

    public function createCollection($className, $data)
    {
        return array_map(function($object) use ($className) {
            return $this->createObject($className, $object);
        }, $data);
    }
}

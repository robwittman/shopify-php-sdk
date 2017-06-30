<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Shopify\ApiInterface;
use Shopify\Object\AbstractObject;
use Shopify\Inflector;
use JsonMapper;
use Shopify\Options\BaseOptions;

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

    public function getCount(Request $request, $options = null)
    {
        if (is_a($options, BaseOptions::class)) {
            $options = $options->export();
        }
        $response = $this->send($request, $options);
        return $this->createObject(null, $data);
    }

    public function getEdge(Request $request, $options = null, $className = null)
    {
        if (is_a($options, BaseOptions::class)) {
            $options = $options->export();
        }
        $response = $this->send($request, $options);
        $handle = $className::getApiHandle();
        $data = $response->{$handle};
        return $this->createCollection($className, $data);
    }

    public function getNode(Request $request, $options = null, $className = null)
    {
        if (is_a($options, BaseOptions::class)) {
            $options = $options->export();
        }
        $response = $this->send($request, $options);
        $handle = Inflector::singularize($className::getApiHandle());
        $data = $response->{$handle};
        return $this->createObject($className, $data);
    }

    public function createRequest($endpoint, $method = self::REQUEST_METHOD_GET)
    {
        return new Request($method, $endpoint);
    }

    public function send(Request $request, $params = null)
    {
        // print_r(func_get_args());
        // exit;
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

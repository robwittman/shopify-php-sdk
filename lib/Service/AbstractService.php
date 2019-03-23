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

    public function request($endpoint, $method = self::REQUEST_METHOD_GET, array $params = array())
    {
        $request = $this->createRequest($endpoint, $method);
        return $this->send($request, $params);
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

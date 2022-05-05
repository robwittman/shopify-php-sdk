<?php

namespace Shopify\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Shopify\ApiInterface;

abstract class AbstractService
{
    /**
     * Instantiated Guzzle Client for requests
     * @var Client
     */
    private $client;

    /**
     * The last API response from Shopify
     * @var Response|null
     */
    private $lastResponse;

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
        $this->client = $api->getHttpHandler();
    }

    /**
     * Get the client instance
     *
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param $endpoint
     * @param string $method
     * @param array $params
     * @return mixed
     */
    public function request($endpoint, $method = self::REQUEST_METHOD_GET, array $params = [])
    {
        return $this->send(new Request($method, $endpoint), $params);
    }

    /**
     * @param $endpoint
     * @param string $method
     * @return Request
     */
    public function createRequest($endpoint, $method = self::REQUEST_METHOD_GET)
    {
        return new Request($method, $endpoint);
    }

    /**
     * Get the last response from Shopify
     * @return Response
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    public function send(Request $request, array $params = array())
    {
        $args = array();
        if ($request->getMethod() === 'GET') {
            $args['query'] = $params;
        } else {
            $args['json'] = $params;
        }

        while (true) {
            try {
                $this->lastResponse = $this->client->send($request, $args);

                return json_decode(
                    $this->lastResponse->getBody()->getContents(),
                    true
                );
            } catch (ClientException $e) {
                if ($e->getCode() !== 429) {
                    throw $e;
                }
            }
        }
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

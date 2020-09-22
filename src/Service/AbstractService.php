<?php

namespace Shopify\Service;

use Exception;
use GuzzleHttp\Client;
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

    const REQUEST_METHOD_GET    = 'GET';
    const REQUEST_METHOD_POST   = 'POST';
    const REQUEST_METHOD_PUT    = 'PUT';
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
        //Set the empty args array
        $args = [];

        //If the method is get we need to send the args as a query other wise the args need to be send as json
        if ($request->getMethod() === 'GET') {
            $args['query'] = $params;
        }
        else {
            $args['json'] = $params;            
        }

        //Load the response in a variable
        $this->lastResponse = $this->client->send($request, $args);
        
        //Decode the json string and save to a varibale.
        //We do need return this derict so we can check for an json error.
        $bodyContents = $this->lastResponse->getBody()->getContents();

        $return = json_decode(
            $bodyContents,
            true
        );

        $json_error = json_last_error();
        if($json_error === JSON_ERROR_NONE){
            var_dump($return);
            if(is_null($return)){
                return $bodyContents;
            }
            return $return;
        }
        else{
            throw new Exception($json_error);
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
<?php

namespace Shopify\Test;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;
use Shopify\Api;

session_start();

class TestCase extends \PHPUnit_Framework_TestCase
{
    public function getApi(array $params = array())
    {
        $api = new Api($params);
        return $api;
    }

    public function getApiMock($file, array $headers = ['X-Foo' => 'Bar'])
    {
        $json = null;
        if (is_array($file)) {
            $json = json_encode($file);
        } else {
            $root = dirname(dirname(__FILE__));
            $path = $root.'/data/mocks/'.$file;
            if (!file_exists($path)) {
                throw new \Exception("Mock for {$path} does not exist");
            }
            $json = file_get_contents($path);
        }
        $mock = new MockHandler([new Response(200, $headers, $json)]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);
        $api = new Api();
        $api->setHttpHandler($client);
        return $api;
    }
}

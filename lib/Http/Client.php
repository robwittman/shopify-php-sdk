<?php

namespace Shopify\Http;

use Shopify\Shopify;
use Shopify\Util;
use Shopify\Exception;

class Client
{
    const TIMEOUT = 60;
    const CONNECT_TIMEOUT = 60;
    private $timeout = self::TIMEOUT;
    private $connect_timeout = self::CONNECT_TIMEOUT;

    private static $instance;
    protected $options;
    protected $headers;
    protected $body;

    public function __construct($options = NULL)
    {
        $this->options = $options;
        // $this->request = new Request();
        // $this->response = new Response();
    }

    public function getOpt()
    {
        return $this->options;
    }

    public function getResponse()
    {
        return $this->response();
    }

    public function request($method, $url, $params = null)
    {
        $this->headers['X-Shopify-Access-Token']    = \Shopify\Shopify::access_token();
        $this->headers['Content-type']              = 'application/json';

        $curl = curl_init();
        $method = strtolower($method);
        $opts = array();
        $headers = self::prepareHeaders($this->headers);

        $rheaders = array();
        $headerCallback = function ($curl, $header_line) use (&$rheaders) {
            // Ignore the HTTP request line (HTTP/1.1 200 OK)
            if (strpos($header_line, ":") === false) {
                return strlen($header_line);
            }
            list($key, $value) = explode(":", trim($header_line), 2);
            $rheaders[trim($key)] = trim($value);
            return strlen($header_line);
        };

        if($method == 'get')
        {
            $opts[CURLOPT_HTTPGET] = 1;
            if(!empty($params))
            {
                $q_string = self::encode($params);
                $url = "$url?$q_string";
            }
        } elseif($method == 'post') {
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = self::jsonEncode($params);
        } elseif($method == 'delete' || $method == 'put') {
            $opts[CURLOPT_CUSTOMREQUEST] = strtoupper($method);
            if(!empty($params))
            {
                if($method == 'delete') {
                    $q_string = self::encode($params);
                    $url = "$url?$q_string";
                } else {
                    $opts[CURLOPT_POSTFIELDS] = self::jsonEncode($params);
                }
            }
        } else {
            throw new Exception\Api("Unrecognized method {$method}");
        }
        $opts[CURLOPT_URL]              = $url;
        $opts[CURLOPT_RETURNTRANSFER]   = TRUE;
        $opts[CURLOPT_CONNECTTIMEOUT]   = $this->connect_timeout;
        $opts[CURLOPT_TIMEOUT]          = $this->timeout;
        $opts[CURLOPT_HEADERFUNCTION]   = $headerCallback;
        $opts[CURLOPT_HTTPHEADER]       = $headers;
        curl_setopt_array($curl, $opts);

        // Let's attempt our curl request
        $res_body = curl_exec($curl);
        $errno = curl_errno($curl);

        if($res_body === false)
        {
            $message = curl_error($curl);
            curl_close($curl);
            $this->handleCurlError($url, $errno, $message);
        }
        $rbody = json_decode($res_body);

        if(!is_null($rbody) && isset($rbody->errors))
        {
            var_dump($rbody->errors);
            throw new Exception\Api($rbody->errors);
        }

        $rcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if($rcode !== 200)
        {
            switch($rcode)
            {
                case 401:
                    $msg = "Invalid API key or wrong password";
                break;
                case 404:
                    $msg = "That resource does not exist";
                break;
                case 406:
                    $msg = "Request Information was Not Acceptable";
                break;
                case 422:
                    $msg = "The body of your request was malformed";
                break;
                case 429:
                    $msg = "You have hit your request limit";
                break;
                case 500:
                    $msg = "There was an error comunicating with Shopify";
                break;
            }
            throw new Exception\Api($msg);
        }
        return array($res_body, $rcode, $rheaders);
    }

    private function handleCurlError($url, $errno, $message)
    {
        switch($errno) {
            case CURLE_COULDNT_CONNECT:
            case CURLE_COULDNT_RESOLVE_HOST:
            case CURLE_OPERATION_TEIMOUTED:
                $msg = "Could not connect to Shopify ($url). Please check your internet connection and try again. If this problem persists, you should check Shopify's service status";
                break;

            default:
                $msg = "nUnexpected error communicating with Shopify";
        }
        $msg .= "\n\n(Network error [errno $errno]: $message)";
        throw new Exception\ConnectionException($msg);
    }

    public static function prepareHeaders($headers)
    {
        $res = array();
        foreach($headers as $key => $value)
        {
            $res[] = $key . ': ' . $value;
        }
        return $res;
    }

    public static function encode($params)
    {
        return http_build_query($params);
    }

    public static function jsonEncode($params)
    {
        return json_encode($params);
    }
}

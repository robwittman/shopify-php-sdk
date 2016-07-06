<?php
/**
 * \Shopify\Http\Client
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 */
namespace Shopify\Http;

use Shopify\Shopify;
use Shopify\Util;

class Client
{
    /**
     * cURL Connection Parameters
     */
    const TIMEOUT = 60;
    const CONNECT_TIMEOUT = 60;
    private $timeout = self::TIMEOUT;
    private $connect_timeout = self::CONNECT_TIMEOUT;

    /**
     * Singleton instance of the cURL handler
     * @var Client
     */
    private static $instance;

    /**
     * HTTP Codes to interpret as successful
     * @var array
     */
    private $success_codes = array(200,201);

    /**
     * Request headers
     * @var array
     */
    protected $headers;

    /**
     * Raw response body
     * @var string
     */
    protected $body;

    public function __construct()
    {

        // $this->request = new Request();
        // $this->response = new Response();
    }

    /**
     * Execute an API Request
     * @param  Request $request
     * @return Response $response
     */
    public function request(Request $request)//$method, $url, $params = array(), $jsonify = true)
    {
        $this->headers['X-Shopify-Access-Token']    = \Shopify\Shopify::access_token();
        $this->headers['Content-type']              = 'application/json';

        $curl = curl_init();
        $method = strtolower($request->getMethod());

        $opts = array();
        $headers = self::prepareHeaders($request->getHeaders());

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

        $url = $request->getPath();
        $params = $request->getParams();
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
            throw new \Shopify\Exception\ApiException("Unrecognized method {$method}");
        }
        $opts[CURLOPT_URL]              = $url;
        $opts[CURLOPT_RETURNTRANSFER]   = TRUE;
        $opts[CURLOPT_CONNECTTIMEOUT]   = $this->connect_timeout;
        $opts[CURLOPT_TIMEOUT]          = $this->timeout;
        $opts[CURLOPT_HEADERFUNCTION]   = $headerCallback;
        $opts[CURLOPT_HTTPHEADER]       = $headers;

        // Execute our curl request
        curl_setopt_array($curl, $opts);
        $res_body = curl_exec($curl);
        $rcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $errno = curl_errno($curl);

        // Check if curl instantiated, or throw an error
        if($res_body === false)
        {
            $message = curl_error($curl);
            curl_close($curl);
            $this->handleCurlError($url, $errno, $message);
        }

        // Create our response objecct
        $response = new Response($res_body, $rcode, $rheaders);

        // Check for Shopify Errors
        $jsonBody = $response->getJsonBody();
        if(!is_null($jsonBody) && isset($jsonBody->errors))
        {
            $errors = $jsonBody->errors;
            if(is_string($errors))
            {
                throw new \Shopify\Exception\ApiException($errors);
            } else {
                $field = key((array) $errors);
                $error = $errors->{$field}[0];
                throw new \Shopify\Exception\ApiException(ucfirst($field).' '.$error);
            }
        }
        unset($jsonBody);

        curl_close($curl);

        $this->handleHttpCode($response->getHttpCode());
        return $response;
    }

    /**
     * Handle our HTTP Code and throw Exception
     * @param  integer  $code
     * @return void
     */
    private function handleHttpCode($code)
    {
        if(!in_array($code, $this->success_codes))
        {
            switch($code)
            {
                case 401:
                    $msg = "Invalid API key or wrong password";
                break;
                case 404:
                    $msg = "That resource does not exist";
                break;
                case 400:
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
                case 503:
                    $msg = "Service unavailable. Is your domain set correctly?";
                break;
                default: $msg = "An unknown error code [{$code}] was returned";
            }
            throw new \Shopify\Exception\ApiException($msg);
        }
    }

    /**
     * We encountered an exception making cURL requests. Handle error Codes
     * @param  string $url
     * @param  integer $errno
     * @param  string $message
     * @return Exception
     */
    private function handleCurlError($url, $errno, $message)
    {
        switch($errno) {
            case CURLE_COULDNT_CONNECT:
            case CURLE_COULDNT_RESOLVE_HOST:
            case CURLE_OPERATION_TIMEDOUT:
                $msg = "Could not connect to Shopify ($url). Please check your internet connection and try again. If this problem persists, you should check Shopify's service status";
                break;

            default:
                $msg = "nUnexpected error communicating with Shopify";
        }
        $msg .= "\n\n(Network error [errno $errno]: $message)";
        throw new \Shopify\Exception\CurlException($msg);
    }

    /**
     * Convert our key => value array to an array of single string headers
     * @param  array $headers
     * @return array
     */
    public static function prepareHeaders($headers)
    {
        $res = array();
        foreach($headers as $key => $value)
        {
            $res[] = "{$key}: {$value}";
        }
        return $res;
    }

    /**
     * Encode query string Parameters
     * @param  array $params
     * @return string
     */
    public static function encode($params)
    {
        return http_build_query($params);
    }

    /**
     * Encode POST object to JSON body
     * @param  mixed $params
     * @return string
     */
    public static function jsonEncode($params)
    {
        return json_encode($params);
    }
}

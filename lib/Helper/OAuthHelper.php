<?php

namespace Shopify\Helper;

use Shopify\Api;
use Shopify\Storage\PersistentStorageInterface;
use GuzzleHttp\Psr7\Request;

class OAuthHelper
{
    protected $storage;
    protected $apiKey;
    protected $apiSecret;
    protected $permissions;
    protected $redirectUri;
    protected $myshopifyDomain;

    public function __construct(Api $api, PersistentStorageInterface $storage)
    {
        $this->apiKey = $api->getApiKey();
        $this->apiSecret = $api->getApiSecret();
        $this->myshopifyDomain = $api->getMyshopifyDomain();
        $this->storage = $storage;
    }

    public function getAuthorizationUrl($redirectUrl, $scope)
    {
        $state = $this->storage->get('state') ?: $this->getPseudoRandomString();
        $this->storage->set('state', $state);

        $params = array(
            'client_id' => $this->apiKey,
            'redirect_uri' => $redirectUrl,
            'state' => $state,
            'scope' => $scope
        );

        return "https://{$this->myshopifyDomain}/admin/oauth/authorize?".http_build_query($params);
    }

    public function getAccessToken($redirectUrl)
    {
        if (!$code = $this->getParam('code')) {
            return null;
        }

        $this->validateCsrf();
        $this->resetCsrf();

        // Create OAuth request and send
        $request = new Request('POST', '/admin/oauth/access_token');
        $response = $this->api->send($request, $params);
        var_dump($response);
    }

    public function getParam($param)
    {
        return isset($_GET[$param]) ?
            $_GET[$param] :
            null;
    }

    public function validateCsrf()
    {
        $state = $this->getState();
        if (!$state) {
            throw new Shopify\Exception\SdkException("CSRF Validation failed. State parameter missing");
        }
        $savedState = $this->storage->get('state');
        if (!$savedState) {
            throw new Shopify\Exception\SdkException("CSRF Validation failed. Saved state parameter missing");
        }

        if (\hash_equals($savedState, $state)) {
            return;
        }
        throw new Shopify\Exception\SdkException("CSRF Validation failed. Provided state and stored state do not match");
    }

    public function resetCsrf()
    {
        $this->storage->set('state', null);
    }

    public function getState()
    {
        return $this->getParam('state');
    }

    public function getPseudoRandomString()
    {
        $length = 32;
        $secure = false;
        $string = openssl_random_pseudo_bytes($length, $secure);
        if ($string === false) {
            throw new Shopify\Exception\SdkException('openssl_random_pseudo_bytes() returned an unknown error.');
        }
        if ($secure !== true) {
            throw new Shopify\Exception\SdkException('openssl_random_pseudo_bytes() returned a pseudo-random string but it was not cryptographically secure and cannot be used.');
        }
        return $this->binToHex($string, $length);
    }

    public function binToHex($binaryData, $length)
    {
        return \substr(\bin2hex($binaryData), 0, $length);
    }
}

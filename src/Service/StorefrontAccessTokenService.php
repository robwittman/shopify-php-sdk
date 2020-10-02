<?php

namespace Shopify\Service;

use Shopify\Object\StorefrontAccessToken;

class StorefrontAccessTokenService extends AbstractService
{
    /**
     * Receive a list of all storefront access tokens.
     *
     * @link   https://help.shopify.com/api/reference/storefrontaccesstoken#index
     * @param  array $params
     * @return StorefrontAccessToken[]
     */
    public function all(array $params = [])
    {
        $endpoint = 'storefront_access_tokens.json';
        $response = $this->request($endpoint, 'GET', $params);

        return $this->createCollection(
            StorefrontAccessToken::class,
            $response['storefront_access_tokens']
        );
    }

    /**
     * Create a new storefront access token.
     *
     * @link   https://help.shopify.com/api/reference/storefrontaccesstoken#create
     * @param  StorefrontAccessToken $storefrontaccesstoken
     * @return void
     */
    public function create(StorefrontAccessToken &$storefrontaccesstoken)
    {
        $endpoint = 'storefront_access_tokens.json';
        $data     = $storefrontaccesstoken->exportData();
        $response = $this->request(
            $endpoint, 'POST', [
            'storefront_access_token' => $data,
            ]
        );
        $storefrontaccesstoken->setData($response['storefront_access_tokens']);
    }

    /**
     * Remove a storefront access token.
     *
     * @link   https://help.shopify.com/api/reference/storefrontaccesstoken#destroy
     * @param  StorefrontAccessToken $storefrontaccesstoken
     * @return void
     */
    public function delete(StorefrontAccessToken $storefrontaccesstoken)
    {
        $endpoint = 'storefront_access_tokens/'.$storefrontaccesstoken->id.'.json';
        $this->request($endpoint, 'DELETE');
    }
}

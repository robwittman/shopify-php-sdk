<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Redirect;
use Shopify\Options\Redirect\GetOptions;
use Shopify\Options\Redirect\ListOptions;
use Shopify\Options\Redirect\CountOptions;

class RedirectService extends AbstractService
{
    /**
     * Receive a list of all redirects
     * @link https://help.shopify.com/api/reference/redirect#index
     * @param  ListOptions  $options
     * @return Redirect[]
     */
    public function all(ListOptions $options = null)
    {
        $request = $this->createRequest('/admin/redirects.json');
        return $this->getEdge($request, $options, Redirect::class);
    }

    /**
     * Receive a count of all redirects
     * @link https://help.shopify.com/api/reference/redirect#count
     * @param  CountOptions $options
     * @return integer
     */
    public function count(CountOptions $options = null)
    {
        $request = $this->createRequest('/admin/redirects/count.json');
        return $this->getCount($request, $options);
    }

    /**
     * Receive a singel redirect
     * @link https://help.shopify.com/api/reference/redirect#show
     * @param  integer $redirectId
     * @param  GetOptions $options
     * @return Redirect
     */
    public function get($redirectId, GetOptions $options = null)
    {
        $request = $this->createRequest('/admin/redirects/'.$redirectId.'.json');
        return $this->getNode($request, $options, Redirect::class);
    }

    /**
     * Create a new redirect
     * @link https://help.shopify.com/api/reference/redirect#create
     * @param  Redirect $redirect
     * @return void
     */
    public function create(Redirect &$redirect)
    {
        $data = $redirect->exportData();
        $request = $this->createRequest('/admin/redirects.json', static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'redirect' => $data
        ));
        $redirect->setData($response->redirect);
    }

    /**
     * Modify an existing redirect
     * @link https://help.shopify.com/api/reference/redirect#update
     * @param  Redirect $redirect
     * @return void
     */
    public function update(Redirect &$redirect)
    {
        $data = $redirect->exportData();
        $request = $this->createRequest('/admin/redirects/'.$redirect->getId()'.json', static::REQUEST_METHOD_PUT);
        $response = $this->send($request, array(
            'redirect' => $data
        ));
        $redirect->setData($response->redirect);
    }

    /**
     * Remove a redirect
     * @link https://help.shopify.com/api/reference/redirect#destroy
     * @param  Redirect $redirect
     * @return void
     */
    public function delete(Redirect $redirect)
    {
        $request = $this->createRequest('/admin/redirects/'.$redirect->getId().'json', static::REQUEST_METHOD_DELETE);
        $this->send($request);
    }
}

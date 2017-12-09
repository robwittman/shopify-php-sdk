<?php

namespace Shopify\Service;

use Shopify\Object\Redirect;

class RedirectService extends AbstractService
{
    /**
     * Receive a list of all redirects
     *
     * @link   https://help.shopify.com/api/reference/redirect#index
     * @param  ListOptions $options
     * @return Redirect[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/admin/redirects.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Redirect::class, $response['collections']);
    }

    /**
     * Receive a count of all redirects
     *
     * @link   https://help.shopify.com/api/reference/redirect#count
     * @param  array $params
     * @return integer
     */
    public function count(array $params = array())
    {
        $endpoint = '/admin/redirects/count.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $response['count'];
    }

    /**
     * Receive a singel redirect
     *
     * @link   https://help.shopify.com/api/reference/redirect#show
     * @param  integer $redirectId
     * @param  array   $params
     * @return Redirect
     */
    public function get($redirectId, array $params = array())
    {
        $endpoint = '/admin/redirects/'.$redirectId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(Redirect::class, $response['redirects']);
    }

    /**
     * Create a new redirect
     *
     * @link   https://help.shopify.com/api/reference/redirect#create
     * @param  Redirect $redirect
     * @return void
     */
    public function create(Redirect &$redirect)
    {
        $endpoint = '/admin/redirects.json';
        $data = $redirect->exportData();
        $response = $this->request($endpoint, "POST", array(
            'redirect' => $data
        ));
        $redirect->setData($response['redirect']);
    }

    /**
     * Modify an existing redirect
     *
     * @link   https://help.shopify.com/api/reference/redirect#update
     * @param  Redirect $redirect
     * @return void
     */
    public function update(Redirect &$redirect)
    {
        $endpoint = '/admin/redirects/'.$redirect->id.'.json';
        $data = $redirect->exportData();
        $response = $this->request($endpoint, "POST", array(
            'redirect' => $data
        ));
        $redirect->setData($response['redirect']);
    }

    /**
     * Remove a redirect
     *
     * @link   https://help.shopify.com/api/reference/redirect#destroy
     * @param  Redirect $redirect
     * @return void
     */
    public function delete(Redirect $redirect)
    {
        $endpoint = '/admin/redirect/'.$redirect->id.'.json';
        $response = $this->request($endpoint, 'DELETE'):
        return;
    }
}

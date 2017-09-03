<?php

namespace Shopify\Service;

use Shopify\Object\ScriptTag;

class ScriptTagService extends AbstractService
{
    /**
     * Get a list of all ScriptTags
     *
     * @link   https://help.shopify.com/api/reference/scripttag#index
     * @param  array $params
     * @return ScriptTag[]
     */
    public function all(array $params = array())
    {
        $request = $this->createRequest('/admin/script_tags.json');
        return $this->getEdge($request, $params, ScriptTag::class);
    }

    /**
     * Receive a count of all ScriptTags
     *
     * @link   https://help.shopify.com/api/reference/scripttag#count
     * @param  array $params
     * @return integer
     */
    public function count(array $params = array())
    {
        $request = $this->createRequest('/admin/script_tags/count.json');
        return $this->getCount($request, $options);
    }

    /**
     * Receive a single Script Tag
     *
     * @link   https://help.shopify.com/api/reference/scripttag#show
     * @param  integer $scriptTagId
     * @param  array   $params
     * @return ScriptTag
     */
    public function get($scriptTagId, array $params = array())
    {
        $request = $this->createRequest('/admin/script_tags/'.$scriptTagId.'.json');
        return $this->getNode($request, $params, ScriptTag::class);
    }

    /**
     * Create a new script tag
     *
     * @link   https://help.shopify.com/api/reference/scripttag#create
     * @param  ScriptTag $scriptTag
     * @return void
     */
    public function create(ScriptTag &$scriptTag)
    {
        $data = $scriptTag->exportData();
        $request = $this->createRequest('/admin/script_tags.json', static::REQUEST_METHOD_POST);
        $response = $this->send(
            $request, array(
            'script_tag' => $data
            )
        );
        $scriptTag->setData($response->script_tag);
    }

    /**
     * Update a script tag
     *
     * @link   https://help.shopify.com/api/reference/scripttag#update
     * @param  ScriptTag $scriptTag
     * @return void
     */
    public function update(ScriptTag $scriptTag)
    {
        $data = $scriptTag->exportData();
        $request = $this->createRequest('/admin/script_tags/'.$script_tag->getId().'.json', static::REQUEST_METHOD_PUT);
        $response = $this->send(
            $request, array(
            'script_tag' => $data
            )
        );
        $scriptTag->setData($response->script_tag);
    }

    /**
     * Delete a script tag
     *
     * @link   https://help.shopify.com/api/reference/scripttag#destroy
     * @param  ScriptTag $scriptTag
     * @return void
     */
    public function delete(ScriptTag $scriptTag)
    {
        $request = $this->createRequest('/admin/script_tags/'.$scriptTag->getId().'json', static::REQUEST_METHOD_DELETE);
        $this->send($request);
    }
}

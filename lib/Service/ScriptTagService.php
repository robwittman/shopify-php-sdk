<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\ScriptTag;
use Shopify\Options\ScriptTag\GetOptions;
use Shopify\Options\ScriptTag\ListOptions;
use Shopify\Options\ScriptTag\CountOptions;

class ScriptTagService extends AbstractService
{
    /**
     * Get a list of all ScriptTags
     * @link https://help.shopify.com/api/reference/scripttag#index
     * @param  ListOptions $options
     * @return ScriptTag[]
     */
    public function all(ListOptions $options = null)
    {
        $request = $this->createRequest('/admin/script_tags.json');
        return $this->getEdge($request, $options, ScriptTag::class);
    }

    /**
     * Receive a count of all ScriptTags
     * @link https://help.shopify.com/api/reference/scripttag#count
     * @param  CountOptions $options
     * @return integer
     */
    public function count(CountOptions $options = null)
    {
        $request = $this->createRequest('/admin/script_tags/count.json');
        return $this->getCount($request, $options);
    }

    /**
     * Receive a single Script Tag
     * @link https://help.shopify.com/api/reference/scripttag#show
     * @param  integer $scriptTagId
     * @param  GetOptions $options
     * @return ScriptTag
     */
    public function get($scriptTagId, GetOptions $options = null)
    {
        $request = $this->createRequest('/admin/script_tags/'.$scriptTagId.'.json');
        return $this->getNode($request, $options, ScriptTag::class);
    }

    /**
     * Create a new script tag
     * @link https://help.shopify.com/api/reference/scripttag#create
     * @param  ScriptTag $scriptTag
     * @return void
     */
    public function create(ScriptTag &$scriptTag)
    {
        $data = $scriptTag->exportData();
        $request = $this->createRequest('/admin/script_tags.json', static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'script_tag' => $data
        ));
        $scriptTag->setData($response->script_tag);
    }

    /**
     * Update a script tag
     * @link https://help.shopify.com/api/reference/scripttag#update
     * @param  ScriptTag $scriptTag
     * @return void
     */
    public function update(ScriptTag $scriptTag)
    {
        $data = $scriptTag->exportData();
        $request = $this->createRequest('/admin/script_tags/'.$script_tag->getId()'.json', static::REQUEST_METHOD_PUT);
        $response = $this->send($request, array(
            'script_tag' => $data
        ));
        $scriptTag->setData($response->script_tag);
    }

    /**
     * Delete a script tag
     * @link https://help.shopify.com/api/reference/scripttag#destroy
     * @param  ScriptTag $scriptTag
     * @return void
     */
    public function delete(ScriptTag $scriptTag)
    {
        $request = $this->createRequest('/admin/script_tags/'.$scriptTag->getId().'json', static::REQUEST_METHOD_DELETE);
        $this->send($request);
    }
}

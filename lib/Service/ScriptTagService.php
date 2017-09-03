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
        $data = $this->request('/admin/script_tags.json', 'GET', $params);
        return $this->createCollection(ScriptTag::class, $data['script_tags']);
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
        $data = $this->request('/admin/script_tags/count.json', 'GET', $params);
        return $data['count'];
    }

    /**
     * Receive a single Script Tag
     *
     * @link   https://help.shopify.com/api/reference/scripttag#show
     * @param  integer $scriptTagId
     * @param  array   $fields
     * @return ScriptTag
     */
    public function get($scriptTagId, array $fields = array())
    {
        $params = array();
        if (!empty($fields)) {
            $params['fields'] = implode(',', $fields);
        }
        $data = $this->request('/admin/script_tags/'.$scriptTagId.'.json', 'GET', $params);
        return $this->createCollection(ScriptTag::class, $data['script_tags']);
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
        $response = $this->request('/admin/script_tags.json', 'POST', array(
            'script_tag' => $data
        ));
        $scriptTag->setData($response['script_tag']);
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
        $response = $this->request('/admin/script_tags/'.$scriptTag->id.'.json', 'PUT', array(
            'script_tag' => $data
        ));
        $scriptTag->setData($response['script_tag']);
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
        $this->request('/admin/script_tags/'.$scriptTag->id.'.json', 'DELETE');
    }
}

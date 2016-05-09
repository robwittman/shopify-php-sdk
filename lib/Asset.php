<?php
/**
 * \Shopify\Asset
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/asset
 */
namespace Shopify;

class Asset extends AbstractChildObject
{
    protected static $parentIdField = 'theme_id';
    protected static $parentUrl = 'themes';
    protected static $classHandle = 'asset';
    protected static $classUrl = 'assets';

    /*******************************************************************************
     * The asset resource uses the asset[key] GET variable to modify resources.
     *
     * Because of this, we have to create and send our own resource objects
     ******************************************************************************/

    /**
     * [get description]
     * @param  [type] $key      [description]
     * @param  [type] $parentId [description]
     * @return [type]           [description]
     */
    public static function get($key, $parentId)
    {
        $path = static::$parentUrl.'/'.$parentId.'/assets';
        $path = \Shopify\Shopify::baseUrl().$path.'.json?asset[key]='.$key;
        $req = new \Shopify\Http\Request($path, 'GET', [], [
            'X-Shopify-Access-Token' => \Shopify\Shopify::access_token(),
            'Content-Type' => 'application/json'
        ]);
        $data = \Shopify\Shopify::instance()->getClient()->request($req);
        return Util\ObjectSet::createObjectFromJson($data->getJsonBody());
    }

    public function update()
    {
        $this->assureKey();
        $path = static::$parentUrl.'/'.$this->{static::$parentIdField}.'/assets';
        $path = \Shopify\Shopify::baseUrl().$path.'.json?asset[key]='.$this->key;
        $req = new \Shopify\Http\Request($path, 'PUT', ['asset' => $this], [
            'X-Shopify-Access-Token' => \Shopify\Shopify::access_token(),
            'Content-Type' => 'application/json'
        ]);
        $data = \Shopify\Shopify::instance()->getClient()->request($req);
        $this->refresh($data->getJsonBody()->{static::$classHandle});
    }

    public function create()
    {
        $this->assureKey();
        $path = static::$parentUrl.'/'.$this->{static::$parentIdField}.'/assets';
        $path = \Shopify\Shopify::baseUrl().$path.'.json?asset[key]='.$this->key;
        $req = new \Shopify\Http\Request($path, 'PUT', ['asset' => $this], [
            'X-Shopify-Access-Token' => \Shopify\Shopify::access_token(),
            'Content-Type' => 'application/json'
        ]);
        $data = \Shopify\Shopify::instance()->getClient()->request($req);
        $this->refresh($data->getJsonBody()->{static::$classHandle});
    }

    public function delete()
    {
        $this->assureKey();
        $path = static::$parentUrl.'/'.$this->{static::$parentIdField}.'/assets';
        $path = \Shopify\Shopify::baseUrl().$path.'.json?asset[key]='.$this->key;
        $req = new \Shopify\Http\Request($path, 'DELETE', ['asset' => $this], [
            'X-Shopify-Access-Token' => \Shopify\Shopify::access_token(),
            'Content-Type' => 'application/json'
        ]);
        $data = \Shopify\Shopify::instance()->getClient()->request($req);
        return NULL;
    }

    public function assureKey()
    {
        if(!isset($this->key) || is_null($this->key))
        {
            throw new Exception\ApiException("Managing the asset resource requires the 'key' field be set");
        }
        return TRUE;
    }
}

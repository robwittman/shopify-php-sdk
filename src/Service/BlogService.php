<?php

namespace Shopify\Service;

use Shopify\Object\Blog;
use Shopify\Exception\ShopifySdkException;

class BlogService extends AbstractService
{
    /**
     * Receive a list of all blogs
     *
     * @link   https://help.shopify.com/api/reference/blog#index
     * @param  array $params
     * @return Blog[]
     */
    public function all(array $params = array())
    {
        $endpoint = 'blogs.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Blog::class, $response['blogs']);
    }

    /**
     * Receive a count of all blogs
     *
     * @link   https://help.shopify.com/api/reference/blog#count
     * @return integer
     */
    public function count()
    {
        $endpoint = 'blogs/count.json';
        $response = $this->request($endpoint, 'GET');
        return $response['count'];
    }

    /**
     * Receive a single blog
     *
     * @link   https://help.shopify.com/api/reference/blog#show
     * @param  integer $blogId
     * @param  array   $fields
     * @return Blog
     */
    public function get($blogId, array $fields = array())
    {
        $params = array();
        if (!empty($fields)) {
            $params['fields'] = implode(',', $fields);
        }
        $endpoint = 'blogs/'.$blogId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(Blog::class, $response['blog']);
    }

    /**
     * Create a new blog
     *
     * @link   https://help.shopify.com/api/reference/blog#create
     * @param  Blog $blog
     * @return void
     */
    public function create(Blog &$blog)
    {
        $data = $blog->exportData();
        $endpoint = 'blogs.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'blog' => $data
            )
        );
        $blog->setData($response['blog']);
    }

    /**
     * Modify an existing blog
     *
     * @link   https://help.shopify.com/api/reference/blog#update
     * @param  Blog $blog
     * @throws ShopifySdkException
     */
    public function update(Blog &$blog)
    {
        throw new ShopifySdkException('BlogService::update() not implemented');
    }

    /**
     * Remove a blog from Database
     *
     * @link   https://help.shopify.com/api/reference/blog#destroy
     * @param  Blog $blog
     * @throws ShopifySdkException
     */
    public function delete(Blog $blog)
    {
        throw new ShopifySdkException('BlogService::delete() not implemented');
    }
}

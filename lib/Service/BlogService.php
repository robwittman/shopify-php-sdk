<?php

namespace Shopify\Service;

use Shopify\Object\Blog;

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
        $endpoint = '/admin/blogs.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Blog::class, $response['blogs']);
    }

    /**
     * Receivea count of all blogs
     *
     * @link   https://help.shopify.com/api/reference/blog#count
     * @return integer
     */
    public function count()
    {
        $endpoint = '/admin/blogs/count.json';
        $response = $this->request($endpoint, 'GET');
        return $response['count'];
    }

    /**
     * Receive a single blog
     *
     * @link   https://help.shopify.com/api/reference/blog#show
     * @param  integer $blogId
     * @param  array   $params
     * @return Blog
     */
    public function get($blogId, array $params = array())
    {
        $endpoint = '/admin/blogs/'.$blogId.'.json';
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
        $endpoint = '/admin/blogs.json';
        $response = $this->request($endpoint, 'POST', array(
            'blog' => $data
        ));
        $blog->setData($response['blog']);
    }

    /**
     * Modify an existing blog
     *
     * @link   https://help.shopify.com/api/reference/blog#update
     * @param  Blog $blog
     * @return void
     */
    public function update(Blog &$blog)
    {
        
    }

    /**
     * Removea blog from Database
     *
     * @link   https://help.shopify.com/api/reference/blog#destroy
     * @param  Blog $blog
     * @return void
     */
    public function delete(Blog $blog)
    {

    }
}

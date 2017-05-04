<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Blog;

class BlogService extends AbstractService
{
    public function get($blogId)
    {
        $request = new Request('GET', '/admin/blogs/'.$blogId.'.json');
        return $this->getNode($request, [], Blog::class);
    }

    public function all(array $params = array())
    {
        $request = new Request('GET', '/admin/blogs.json');
        return $this->getEdge($request, $params, Blog::class);
    }

    public function count(array $params = array())
    {
        $request = new Request('GET', '/admin/blogs/count.json');
        return $this->getCount($request, $params);
    }

    public function create(Blog $blog)
    {

    }

    public function update(Blog $blog)
    {

    }

    public function delete(Blog $blog)
    {
        
    }
}

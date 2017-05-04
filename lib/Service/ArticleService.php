<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Article;

class ArticleService extends AbstractService
{
    public function create(Article $charge)
    {

    }

    public function get($blogId, $articleId)
    {
        $request = new Request('GET', '/admin/blogs/'.$blogId.'/articles/'.$articleId.'.json');
        return $this->getNode($request, [], Article::class);
    }

    public function all($blogId, array $params = array())
    {
        $request = new Request('GET', '/admin/blogs/'.$blogId.'/articles.json');
        return $this->getEdge($request, $params, Article::class);
    }

    public function count($blogId, array $params = array())
    {
        $request = new Request('GET', '/admin/blogs/'.$blogId.'/articles/count.json');
        return $this->getCount($request, $params);
    }

    public function create($blogId, Article $article)
    {

    }

    public function update($blogId, Article $article)
    {

    }

    public function authors()
    {
        $request = new Request('GET', '/admin/articles/authors');
        return $this->getEdge($request, $params, null);
    }

    public function delete($blogId, Article $article)
    {
        
    }
}

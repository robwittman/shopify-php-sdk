<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Article;
use Shopify\Options\Article\GetOptions;
use Shopify\Options\Article\ListOptions;
use Shopify\Options\Article\CountOptions;

class ArticleService extends AbstractService
{
    public function create(Article $charge)
    {

    }

    public function get($blogId, $articleId, GetOptions $options = null)
    {
        $params = is_null($options) ? array() : $options->export();
        $request = new Request('GET', '/admin/blogs/'.$blogId.'/articles/'.$articleId.'.json');
        return $this->getNode($request, $params, Article::class);
    }

    public function all($blogId, ListOptions $options = null)
    {
        $params = is_null($options) ? array() : $options->export();
        $request = new Request('GET', '/admin/blogs/'.$blogId.'/articles.json');
        return $this->getEdge($request, $params, Article::class);
    }

    public function count($blogId, CountOptions $options = null)
    {
        $params = is_null($options) ? array() : $options->export();
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

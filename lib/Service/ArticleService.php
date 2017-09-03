<?php

namespace Shopify\Service;

use Shopify\Object\Article;

class ArticleService extends AbstractService
{
    /**
     * Receive a list of Articles
     *
     * @link   https://help.shopify.com/api/reference/article#index
     * @param  integer $blogId
     * @param  array   $params
     * @return Article[]
     */
    public function all($blogId, array $params = array())
    {
        $endpoint = '/admin/blogs/'.$blogId.'/articles.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $params, Article::class);
    }

    /**
     * Receive acount of all Articles
     *
     * @link   https://help.shopify.com/api/reference/article#count
     * @param  integer $blogId
     * @param  array   $params
     * @return integer
     */
    public function count($blogId, array $params = array())
    {
        $endpoint = '/admin/blogs/'.$blogId.'/articles/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getCount($request, $options, Article::class);
    }

    /**
     * Receive a single article
     *
     * @link   https://help.shopify.com/api/reference/article#show
     * @param  integer $blogId
     * @param  integer $articleId
     * @param  array   $params
     * @return Article
     */
    public function get($blogId, $articleId, array $params = array())
    {
        $endpoint = '/admin/blogs/'.$blogId.'/articles/'.$articleId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $params, Article::class);
    }

    /**
     * Create a new Article
     *
     * @link   https://help.shopify.com/api/reference/article#create
     * @param  integer $blogId
     * @param  Article $article
     * @return void
     */
    public function create($blogId, Article &$article)
    {
        $data = $article->exportData();
        $endpoint = '/admin/blogs/'.$blogId.'/articles.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send(
            $request, array(
            'article' => $data
            )
        );
        $article->setData($response->article);
    }

    /**
     * Modify an existing article
     *
     * @link   https://help.shopify.com/api/reference/article#update
     * @param  integer $blogId
     * @param  Article $article
     * @return void
     */
    public function update($blogId, Article &$article)
    {
        $data = $article->exportData();
        $endpoint = '/admin/blogs/'.$blogId.'/articles/'.$article->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_PUT);
        $response = $this->send(
            $request, array(
            'article' => $data
            )
        );
        $article->setData($response->article);
    }

    /**
     * Remove an article from the database
     *
     * @link   https://help.shopify.com/api/reference/article#destroy
     * @param  integer $blogId
     * @param  Article $article
     * @return void
     */
    public function delete($blogId, Article &$article)
    {
        $articleId = $article->getId();
        $endpoint = '/admin/blogs/'.$blogId.'/articles/'.$articleId.'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_DELETE);
        $response = $this->send($request);
        return null;
    }

    /**
     * Get a list of all the authors
     *
     * @link   https://help.shopify.com/api/reference/article#authors
     * @return arrays
     */
    public function authors()
    {
        $endpoint = '/admin/articles/authors.json';
        $request = $this->createRequest($endpoint);
        $response = $this->send($request);
        return $response->authors;
    }

    /**
     * Get a list of all the tags
     *
     * @link   https://help.shopify.com/api/reference/article#tags
     * @return array
     */
    public function tags()
    {
        $endpoint = '/admin/articles/tags.json';
        $request = $this->createRequest($endpoint);
        $response = $this->send($request);
        return $responsee->tags;
    }
}

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
        $endpoint = '/blogs/'.$blogId.'/articles.json';
        $data = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Article::class, $data['articles']);
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
        $endpoint = '/blogs/'.$blogId.'/articles/count.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $response['count'];
    }

    /**
     * Receive a single article
     *
     * @link   https://help.shopify.com/api/reference/article#show
     * @param  integer $blogId
     * @param  integer $articleId
     * @param  array   $fields
     * @return Article
     */
    public function get($blogId, $articleId, array $fields = array())
    {
        $params = array();
        if (!empty($fields)) {
            $params['fields'] = implode(',', $fields);
        }
        $endpoint = '/blogs/'.$blogId.'/articles/'.$articleId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(Article::class, $response['article']);
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
        $endpoint = '/blogs/'.$blogId.'/articles.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'article' => $data
            )
        );
        $article->setData($response['article']);
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
        $endpoint = '/blogs/'.$blogId.'/articles/'.$article->id.'.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'article' => $data
            )
        );
        $article->setData($response['article']);
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
        $endpoint = '/blogs/'.$blogId.'/articles/'.$articleId.'.json';
        $this->request($endpoint, 'DELETE');
    }

    /**
     * Get a list of all the authors
     *
     * @link   https://help.shopify.com/api/reference/article#authors
     * @return arrays
     */
    public function authors()
    {
        $endpoint = '/articles/authors.json';
        $response = $this->request($endpoint, 'GET');
        return $response['authors'];
    }

    /**
     * Get a list of all the tags
     *
     * @link   https://help.shopify.com/api/reference/article#tags
     * @return array
     */
    public function tags()
    {
        $endpoint = '/articles/tags.json';
        $response = $this->request($endpoint, 'GET');
        return $response['tags'];
    }
}

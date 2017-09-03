<?php

namespace Shopify\Service;

use Shopify\Object\Webhook;

class WebhookService extends AbstractService
{
    /**
     * Receive a list of all webhooks
     *
     * @link   https://help.shopify.com/api/reference/webhook#index
     * @param  array $params
     * @return Webhook[]
     */
    public function all(array $params = array())
    {
        $request = $this->createRequest('/admin/webhooks.json');
        return $this->getEdge($request, $params, Webhook::class);
    }

    /**
     * Receive a count of all webhooks
     *
     * @link   https://help.shopify.com/api/reference/webhook#count
     * @param  array $params
     * @return integer
     */
    public function count(array $params = array())
    {
        $request = $this->createRequest('/admin/webhooks/count.json');
        return $this->getCount($request, $options);
    }

    /**
     * Receive a single webhook
     *
     * @link   https://help.shopify.com/api/reference/webhook#show
     * @param  integer $webhookId
     * @param  array   $params
     * @return Webhook
     */
    public function get($webhookId, array $params = array())
    {
        $request = $this->createRequest('/admin/webhooks/'.$webhookId.'.json');
        return $this->getNode($request, $params, Webhook::class);
    }

    /**
     * Create a new webhook
     *
     * @link   https://help.shopify.com/api/reference/webhook#create
     * @param  Webhook $webhook
     * @return void
     */
    public function create(Webhook &$webhook)
    {
        $data = $webhook->exportData();
        $request = $this->createRequest('/admin/webhooks.json', static::REQUEST_METHOD_POST);
        $response = $this->send(
            $request, array(
            'webhook' => $data
            )
        );
        $webhook->setData($response->webhook);
    }

    /**
     * Modify an existing webhook
     *
     * @link   https://help.shopify.com/api/reference/webhook#update
     * @param  Webhook $webhook
     * @return void
     */
    public function update(Webhook $webhook)
    {
        $data = $webhook->exportData();
        $request = $this->createRequest('/admin/webhooks/'.$webhook->getId().'.json', static::REQUEST_METHOD_PUT);
        $response = $this->send(
            $request, array(
            'webhook' => $data
            )
        );
        $webhook->setData($response->webhook);
    }

    /**
     * Delete a webhook
     *
     * @link   https://help.shopify.com/api/reference/webhook#destroy
     * @param  Webhook $webhook
     * @return void
     */
    public function delete(Webhook $webhook)
    {
        $request = $this->createRequest('/admin/webhooks/'.$webhook->getId().'json', static::REQUEST_METHOD_DELETE);
        $this->send($request);
    }
}

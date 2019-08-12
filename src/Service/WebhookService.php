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
    public function all(array $params = [])
    {
        $response = $this->request('webhooks.json', 'GET', $params);
        return $this->createCollection(Webhook::class, $response['webhooks']);
    }

    /**
     * Receive a count of all webhooks
     *
     * @link   https://help.shopify.com/api/reference/webhook#count
     * @param  array $params
     * @return integer
     */
    public function count(array $params = [])
    {
        $response = $this->request('webhooks/count.json', $params);
        return $response['count'];
    }

    /**
     * Receive a single webhook
     *
     * @link   https://help.shopify.com/api/reference/webhook#show
     * @param  integer $webhookId
     * @param  array   $fields
     * @return Webhook
     */
    public function get($webhookId, array $fields = [])
    {
        $params = [];
        if (!empty($fields)) {
            $params['fields'] = implode(',', $fields);
        }
        $response = $this->request('webhooks/'.$webhookId.'.json', 'GET', $params);
        return $this->createObject(Webhook::class, $response['webhook']);
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
        $response = $this->request(
            '/webhooks.json', 'POST', array(
            'webhook' => $data
            )
        );
        $webhook->setData($response['webhook']);
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
        $response = $this->request(
            '/webhooks/'.$webhook->id.'.json', 'PUT', array(
            'webhook' => $data
            )
        );
        $webhook->setData($response['webhook']);
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
        $this->request('webhooks/'.$webhook->id.'.json', 'DELETE');
    }
}

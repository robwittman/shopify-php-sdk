<?php

namespace Shopify\Service;

class GraphQLService extends AbstractService
{
  const MAX_TRIES = 10;

  public function graph(string $query, array $variables = [], $tries = 0)
  {
    // Build the request
    $request = ['query' => $query];
    if (count($variables) > 0) {
        $request['variables'] = $variables;
    }

    // Create the request, pass the access token and optional parameters
    $endpoint = 'graphql.json';
    $response = $this->request(
        $endpoint,
        'POST',
        $request
    );

    if ($error = data_get($response, 'errors')) {
        $code = data_get($error, '0.extensions.code');
        if ($code === 'THROTTLED' && $tries < self::MAX_TRIES) {
            sleep(1);
            return $this->graph($query, $variables, $tries + 1);
        }
    }

    return (object) [
        'response'   => $response
    ];
  }
}

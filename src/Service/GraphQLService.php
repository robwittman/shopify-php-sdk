<?php

namespace Shopify\Service;

class GraphQLService extends AbstractService
{
  const MAX_TRIES = 10;

  public function graph(string $query, array $variables = [], $max_tries = 0)
  {
    $max_tries = $max_tries ?? self::MAX_TRIES;
    // Build the request
    $request = ['query' => $query];
    if (count($variables) > 0) {
        $request['variables'] = $variables;
    }

    // Create the request, pass the access token and optional parameters
    $endpoint = 'graphql.json';
    $tries = 0;

    do {
        $response = $this->request(
            $endpoint,
            'POST',
            $request
        );

        $error = data_get($response, 'errors');
        $code = data_get($error, '0.extensions.code');
    } while ($code === 'THROTTLED' && $tries++ < $max_tries);

    return (object) [
        'response'   => $response
    ];
  }
}

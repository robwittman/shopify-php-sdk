<?php

namespace Shopify\Service;

class GraphQLService extends AbstractService
{

  public function graph(string $query, array $variables = [])
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

    return (object) [
        'response'   => $response
    ];
  }
}

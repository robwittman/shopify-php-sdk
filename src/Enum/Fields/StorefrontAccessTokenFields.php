<?php

namespace Shopify\Enum\Fields;

class StorefrontAccessTokenFields extends AbstractObjectEnum
{
    const ID                   = 'id';
    const ACCESS_TOKEN         = 'access_token';
    const ACCESS_SCOPE         = 'access_scope';
    const CREATED_AT           = 'created_at';
    const TITLE                = 'title';
    const ADMIN_GRAPHQL_API_ID = 'admin_graphql_api_id';

    public function getFieldTypes()
    {
        return array(
            'id'                   => 'integer',
            'access_token'         => 'string',
            'access_scope '        => 'string',
            'created_at'           => 'DateTime',
            'title'                => 'string',
            'admin_graphql_api_id' => 'string',
        );
    }
}

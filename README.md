# Shopify PHP SDK

This SDK was created to enable rapid efficient development using Shopify's API.

## Installation

Easily install this package with composer

```shell
composer require robwittman/shopify-php-sdk
```

Before you can start using this SDK, you have to create a <a href="https://partners.shopify.com/">Shopify Application</a>
You can now use the API key and secret to generate access tokens, which can then access a stores data

### Authentication

TO get started with Shopify's API, you need to get a store access token.
```php
$api = new Shopify\Api();
$api
    ->setApiKey(API_KEY)
    ->setApiSecret(API_SECRET)
    ->setMyshopifyDomain($domain);
$helper = $api->getOAuthHelper();
$url = $helper->getAuthorizationUrl('http://localhost', 'write_products,read_orders');

// When returning from OAuth
$helper = $api->getOAuthHelper();
$token = $helper->getAccessToken($code);
```

## References

[Shopify Partner Login](https://partners.shopify.com)

[Shopify API Reference](https://help.shopify.com/api/reference)

[SDK Usage Examples](https://github.com/RobbyBugatti/shopify-php/examples)

# Shopify PHP SDK

This SDK was created to enable rapid efficient development using Shopify's API.

## Installation

Easily install this package with composer

```shell
composer require robwittman/shopify-php-sdk
```

Before you can start using this SDK, you have to create a <a href="https://partners.shopify.com/">Shopify Application</a>
You can now use the API key and secret to generate access tokens, which can then access a stores data

## Initialization

To initialize the Api Client:

```php
$client = new Shopify\Api(array(
    'api_key' => '<api_key>',
    'api_secret' => '<api_secret>',
    'myshopify_domain' => 'store.myshopify.com',
    'access_token' => '<store_access_token>'
));
```

If you are using a Private App for use on an individual store:
```php
$client = new Shopify\PrivateApi(array(
    'api_key' => '<api-key>',
    'password' => '<password>',
    'shared_secret' => '<shared-secret>',
    'myshopify_domain' => '<store>.myshopify.com'
));
```

Once the client is initialized, you can then create a service, and use it to communicate with the api

### Reading

```php
$service = new Shopify\Service\ProductService($client);
$service->all(); #Fetch all products, with optional params
$service->get($productId); # Get a single product
$service->count(); # Count the resources
```

### Creating

```php
$service = new Shopify\Service\ProductService($client);
$product = new Shopify\Object\Product();
# Set some product fields
$product->title = 'Test Product';
$product->vendor = 'Printer';

$service->create($product);
```

### Updating

```php
$service = new Shopify\Service\ProductService($client);
$product = $service->get($productId);
# Set some product fields
$product->title = 'Test Product';
$product->vendor = 'Printer';

$service->update($product);
```

### Deleting
```php
$service = new Shopify\Service\ProductService($client);
$service->delete($productId);
```

## Authentication

Authentication to Shopify's API is done through access tokens, which are obtained through OAuth. To get a
token, there is a helper library packaged with this client

```php
$client = new Shopify\Api($params);
$helper = $client->getOAuthHelper();

$redirectUri = 'https://localhost/install.php';
$scopes = 'write_products,read_orders,...';

$authorizationUrl = $helper->getAuthorizationUrl($redirectUri, $scopes);
header("Location: {$authorizationUrl}");
```

At your `redirect_uri`, instantiate the helper again to get an access token
```php
$client = new Shopify\Api($params);
$helper = $client->getOAuthHelper();

$token = $helper->getAccessToken($code);
echo $token->access_token;
echo $token->scopes;
```

By default, this uses simple session storage. You can implement a custom class that implements `PersistentStorageInterface`,
pass that to `new Shopify\Api()`, and `OAuthHelper` will use that instead. This will be required if authorization requests and
redirects may be directed to different servers.

### Using objects

Object properties can be accessed using `object->property`. Nested objects are instantiated classes. All timestamp fields are instances of `\DateTime`.

```php
use Shopify\Enum\Fields\ProductFields;
use Shopify\Enum\Fields\ProductVariantFields;

$product = $service->get($productId);
echo $product->created_at->format('Y-m-d H:i:s');
echo $product->title;

foreach ($product->variants as $variant) {
    echo $variant->option1;
    echo $variant->option2;
}
```

## References

[Shopify Partner Login](https://partners.shopify.com)

[Shopify API Reference](https://help.shopify.com/api/reference)

[SDK Usage Examples](https://github.com/RobbyBugatti/shopify-php/examples)

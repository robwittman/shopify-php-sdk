### 1.0.0 2016-05-9

 * Initial Release
 * Support created for all objects except CustomerSavedSearch, FulfillmentService, Metafields, Multipass, ShippingZone and TaxService
 * Supported by TravisCI

### 1.0.1 2016-05-10

 * Fixed Shopify\Shopify static function error

### 1.0.2 2016-06-15

 * Fixed exception when Http\Client calls failed due to non-API causes
 * Using uninitialized SDK now throws Exception instead of vague errors

### 1.0.3 2016-06-15

 * Http\Client now correctly handles cURL network errors, such as no internet or failure to resolve hosts
 * Tests included for Http\Client
 * README updated as to usage of 'strict' API execution.
 * Added facilities for checking nonce variables during authentication

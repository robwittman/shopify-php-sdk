<?php
/**
 * \Shopify\Http\Client
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 */
namespace Shopify\Http;

use Shopify\Http\Client;
use Shopify\Shopify;
use Shopify\Util;
use Shopify\Exception;


class TestClient
{
    private $routes = array();
    private $path = '';

    public function __construct()
    {
        $this->initRoutes();
    }

    /**
     * Here we intercept the API request, find the filepath for our mock response,
     * and return a new Response object using that response body
     *
     * @todo Clean this thing up
     * @param  Request $request
     * @return Response
     */
    public function request(Request $request)//$method, $url, $params = array(), $jsonify = true)
    {
        $pieces = explode('/', $request->getPath());
        $query = $this->getQueryFromPath($request->getPath());
        $params = $request->getParams();
        if(isset($query['asset']))
        {
            if(isset($params['asset']))
            {
                $response = new Response(json_encode($params), 200);
            }
            else
            {
                $asset = file_get_contents(MOCK_DIR.'objects/Asset.json');
                $response = new Response($asset, 200);
            }
            return $response;
        }

        if($pieces[count($pieces) - 1] == 'count.json')
        {

            $response = new Response(json_encode(['count' => 12345]), 200);
            return $response;
        } else if($pieces[count($pieces) - 1] == 'account_activation_url.json')
        {
            $response = new Response(json_encode(['account_activation_url' => 'http://google.com/acitvate/your/account']), 200);
            return $response;
        }

        if(strtolower($request->getMethod()) == 'post' || strtolower($request->getMethod()) == "put")
        {
            // If ID is not set, we set it so fake creations occur;
            if(is_null($request->getBody()))
            {
                $response = new Response('{}', 200);
                return $response;
            }
            $body = json_decode($request->getBody());
            $key = key((array) $body);
            if(!property_exists($body->{$key}, 'id') || is_null($body->{$key}->id))
            {
                $body->{$key}->id = uniqid();
            }
            $response = new Response(json_encode($body), $request->getMethod() == 'POST' ? 201 : 200);
            return $response;
        }
        else if(strtolower($request->getMethod()) == 'delete')
        {
            $response = new Response('{}', 200);
            return $response;
        }
        $url = $request->getPath();
        $parsed_url = parse_url($url);
        $admin_path = str_replace('/admin/', '', $parsed_url['path']);
        $filepath = $this->getMockResponseFilePath($admin_path, strtolower($request->getMethod()));
        $res_body = file_get_contents($filepath);
        $response = new Response($res_body, 200);
        return $response;
    }

    /**
     * We simply parse the request path to find out the resource we want,
     * and retturn the mock response from the MOCK_DIR
     *
     * @param  string $path
     * @param  string $method
     * @return string
     */
    protected function getMockResponseFilePath($path, $method)
    {
        foreach($this->routes as $key => $val)
        {
            if(is_array($val))
            {
                $val = array_change_key_case($val, CASE_LOWER);
                if(isset($val[$method]))
                {
                    $val = $val[$method];
                } else {
                    continue;
                }
            }

            $key = str_replace(array(':any', ':num'), array('[^/]+', '[0-9]+'), $key);

            if(preg_match('#^'.$key.'$#', $path, $matches))
            {
                return $val;
            }
        }
        throw new \Exception("Could not find file for [{$path}]");
    }

    protected function getQueryFromPath($path)
    {
        $res = array();
        $pieces = parse_url($path);
        if(!isset($pieces['query'])) return $res;
        parse_str($pieces['query'], $res);
        return $res;
    }
    /**
     * Set all the routes needed for mock API responses
     * @return void
     */
    private function initRoutes()
    {
        $obj_dir = MOCK_DIR.'objects/';
        $list_dir = MOCK_DIR.'lists/';

        $this->routes['application_charges.json']['get']                = $list_dir.'ApplicationChargeList.json';
        $this->routes['application_charges/(:num).json']['get']         = $obj_dir.'ApplicationCharge.json';
        $this->routes['articles/tags.json']['get']                      = $list_dir.'TagsList.json';
        $this->routes['blogs/(:num)/articles.json']['get']              = $list_dir.'ArticlesList.json';
        $this->routes['blogs/(:num)/articles/tags.json']['get']         = $list_dir.'TagsList.json';
        $this->routes['blogs/(:num)/articles/(:num).json']['get']       = $obj_dir.'Article.json';
        $this->routes['articles/authors.json']['get']                   = $list_dir.'AuthorsList.json';
        $this->routes['blogs.json']['get']                              = $list_dir.'BlogsList.json';
        $this->routes['blogs/(:num).json']['get']                       = $obj_dir.'Blog.json';
        $this->routes['checkouts.json']['get']                          = $list_dir.'AbandonedCheckoutsList.json';
        $this->routes['carrier_services.json']                          = $list_dir.'CarrierServicesList.json';
        $this->routes['carrier_services/(:num).json']                   = $obj_dir.'CarrierService.json';
        $this->routes['checkouts/count.json']['get']                    = $obj_dir.'CountTest.json';
        $this->routes['collects.json']['get']                           = $list_dir.'CollectsList.json';
        $this->routes['collects/(:num).json']['get']                    = $obj_dir.'Collect.json';
        $this->routes['comments.json']['get']                           = $list_dir.'CommentsList.json';
        $this->routes['comments/(:num).json']['get']                    = $obj_dir.'Comment.json';
        $this->routes['comments/(:num)/approve.json']['post']           = $obj_dir.'Comment.json';
        $this->routes['comments/(:num)/spam.json']['post']              = $obj_dir.'Comment.json';
        $this->routes['comments/(:num)/not_spam.json']['post']          = $obj_dir.'Comment.json';
        $this->routes['comments/(:num)/remove.json']['post']            = $obj_dir.'Comment.json';
        $this->routes['comments/(:num)/restore.json']['post']           = $obj_dir.'Comment.json';
        $this->routes['countries.json']['get']                          = $list_dir.'CountriesList.json';
        $this->routes['countries/(:num).json']['get']                   = $obj_dir.'Country.json';
        $this->routes['countries/(:num)/provinces.json']                = $list_dir.'ProvincesList.json';
        $this->routes['countries/(:num)/provinces/(:num).json']         = $obj_dir.'Province.json';
        $this->routes['custom_collections.json']['get']                 = $list_dir.'CustomCollectionsList.json';
        $this->routes['custom_collections/(:num).json']['get']          = $obj_dir.'CustomCollection.json';
        $this->routes['customers.json']['get']                          = $list_dir.'CustomersList.json';
        $this->routes['customers/(:num).json']['get']                   = $obj_dir.'Customer.json';
        $this->routes['customers/(:num)/addresses.json']                = $list_dir.'CustomerAddressesList.json';
        $this->routes['customers/(:num)/addresses/(:num).json']         = $obj_dir.'CustomerAddress.json';
        $this->routes['discounts.json']['get']                          = $list_dir.'DiscountsList.json';
        $this->routes['discounts/(:num).json']['get']                   = $obj_dir.'Discount.json';
        $this->routes['events.json']['get']                             = $list_dir.'EventsList.json';
        $this->routes['events/(:num).json']['get']                      = $obj_dir.'Event.json';
        $this->routes['gift_cards.json']['get']                         = $list_dir.'GiftCardsList.json';
        $this->routes['gift_cards/(:num).json']['get']                  = $obj_dir.'GiftCard.json';
        $this->routes['locations.json']['get']                          = $list_dir.'LocationsList.json';
        $this->routes['locations/(:num).json']['get']                   = $obj_dir.'Location.json';
        $this->routes['metafields.json']                                = $list_dir.'MetafieldsList.json';
        $this->routes['orders.json']['get']                             = $list_dir.'OrdersList.json';
        $this->routes['orders/(:num).json']['get']                      = $obj_dir.'Order.json';
        $this->routes['orders/(:num)/fulfillments.json']['get']         = $list_dir.'FulfillmentsList.json';
        $this->routes['orders/(:num)/fulfillments/(:num).json']['get']  = $obj_dir.'Fulfillment.json';
        $this->routes['orders/(:num)/risks.json']['get']                = $list_dir.'OrderRisksList.json';
        $this->routes['orders/(:num)/risks/(:num).json']['get']         = $obj_dir.'OrderRisks.json';
        $this->routes['orders/(:num)/transactions.json']                = $list_dir.'TransactionsList.json';
        $this->routes['orders/(:num)/transactions/(:num).json']         = $obj_dir.'Transaction.json';
        $this->routes['orders/(:num)/refunds.json']                     = $list_dir.'RefundsList.json';
        $this->routes['orders/(:num)/refunds/(:num).json']              = $obj_dir.'Refund.json';
        $this->routes['orders/(:num)/fulfillments/(:num)/events.json']  = $list_dir.'FulfillmentEventsList.json';
        $this->routes['orders/(:num)/fulfillments/(:num)/events/(:num).json'] = $obj_dir.'FulfillmentEvent.json';
        $this->routes['pages.json']                                     = $list_dir.'PagesList.json';
        $this->routes['pages/(:num).json']                              = $obj_dir.'Page.json';
        $this->routes['products.json']['get']                           = $list_dir.'ProductsList.json';
        $this->routes['products/(:num).json']['get']                    = $obj_dir.'Product.json';
        $this->routes['products/(:num).json']['post']                   = $obj_dir.'Product.json';
        $this->routes['products/(:num).json']['put']                    = $obj_dir.'Product.json';
        $this->routes['products/(:num)/variants.json']['get']           = $list_dir.'ProductVariantsList.json';
        $this->routes['products/(:num)/variants/(:num).json']['get']    = $obj_dir.'ProductVariant.json';
        $this->routes['shop.json']['get']                               = $obj_dir.'Shop.json';
        $this->routes['themes.json']                                    = $list_dir.'ThemesList.json';
        $this->routes['themes/(:num).json']                             = $obj_dir.'Theme.json';
        $this->routes['themes/(:num)/assets.json']                      = $list_dir.'AssetsList.json';
        $this->routes['products.json']['get']                           = $list_dir.'ProductsList.json';
        $this->routes['policies.json']                                  = $list_dir.'PoliciesList.json';
        $this->routes['products/(:num).json']['get']                    = $obj_dir.'Product.json';
        $this->routes['products/(:num)/images.json']                    = $list_dir.'ProductImagesList.json';
        $this->routes['products/(:num)/images/(:num).json']             = $obj_dir.'ProductImage.json';
        $this->routes['recurring_application_charges.json']             = $list_dir.'RecurringApplicationChargesList.json';
        $this->routes['recurring_application_charges/(:num).json']      = $obj_dir.'RecurringApplicationCharge.json';
        $this->routes['recurring_application_charges/(:num)/activate.json'] = $obj_dir.'RecurringApplicationCharge.json';
        $this->routes['recurring_application_charges/(:num)/usage_charges.json'] = $list_dir.'UsageChargesList.json';
        $this->routes['recurring_application_charges/(:num)/usage_charges/(:num).json'] = $obj_dir.'UsageCharge.json';
        $this->routes['redirects.json']                                 = $list_dir.'RedirectsList.json';
        $this->routes['redirects/(:num).json']                          = $obj_dir.'Redirect.json';
        $this->routes['script_tags.json']                               = $list_dir.'ScriptTagsList.json';
        $this->routes['script_tags/(:num).json']                        = $obj_dir.'ScriptTag.json';
        $this->routes['themes.json']                                    = $list_dir.'ThemesList.json';
        $this->routes['themes/(:num).json']                             = $obj_dir.'Theme.json';
        $this->routes['themes/(:num)/assets.json']                      = $list_dir.'AssetsList.json';
        $this->routes['smart_collections.json']                         = $list_dir.'SmartCollectionsList.json';
        $this->routes['smart_collections/(:num).json']                  = $obj_dir.'SmartCollection.json';
        $this->routes['users.json']                                     = $list_dir.'UsersList.json';
        $this->routes['users/(:num).json']                              = $obj_dir.'User.json';
        $this->routes['users/current.json']                             = $obj_dir.'User.json';
        $this->routes['webhooks.json']['get']                           = $list_dir.'WebhooksList.json';
        $this->routes['webhooks/(:num).json']['get']                    = $obj_dir.'Webhook.json';
    }
}

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
     * @param  Request $request
     * @return Response
     */
    public function request(Request $request)//$method, $url, $params = array(), $jsonify = true)
    {
        $url = $request->getPath();
        $parsed_url = parse_url($url);
        $admin_path = str_replace('/admin/', '', $parsed_url['path']);
        $filepath = $this->getMockResponseFilePath($admin_path, strtolower($request->getMethod()));
        $res_body = file_get_contents($filepath);
        $response = new Response($res_body, $request->getMethod() == 'POST' ? 201 : 200);
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
    }

    /**
     * Set all the routes needed for mock API responses
     * @return void
     */
    private function initRoutes()
    {
        $obj_dir = MOCK_DIR.'objects/';
        $list_dir = MOCK_DIR.'lists/';

        // Set our possible routes

        /** Abandoned Checkouts */
        $this->routes['checkouts.json']['get']                          = $list_dir.'AbandonedCheckoutsList.json';
        $this->routes['checkouts/count.json']['get']                    = $obj_dir.'CountTest.json';

        /** Application Charge */
        $this->routes['application_charges.json']['get']                = $list_dir.'ApplicationChargeList.json';
        $this->routes['application_charges/(:num).json']['get']         = $obj_dir.'ApplicationCharge.json';

        /** Article */
        $this->routes['blogs/(:num)/articles.json']['get']              = $list_dir.'ArticlesList.json';
        $this->routes['blogs/(:num)/articles/(:num).json']['get']       = $obj_dir.'Article.json';

        /** Blog */
        $this->routes['blogs.json']['get']                              = $list_dir.'BlogsList.json';
        $this->routes['blogs/(:num).json']['get']                       = $obj_dir.'Blog.json';
        /** ProductVariants */
        $this->routes['products/(:num)/variants.json']['get']           = $list_dir.'ProductVariantsList.json';
        $this->routes['products/(:num)/variants/(:num).json']['get']    = $obj_dir.'ProductVariant.json';

        $this->routes['shop.json']['get']                               = $obj_dir.'Shop.json';
        $this->routes['products.json']['get']                           = $list_dir.'ProductsList.json';
        $this->routes['products/(:num).json']['get']                    = $obj_dir.'Product.json';
    }
}

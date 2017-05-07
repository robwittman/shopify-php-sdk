<?php
/**
 *
 * Shopify\Object\Report
 *
 * You can use the Reports Publishing API to publish reports to the Reports page
 * in the Shopify admin. For example, a shirt fulfillment app could publish a report
 * that shows the sales of shirts by the marketing campaign. The reports are based
 * on queries written in ShopifyQL.
 *
 * MIT License
 *
 * Copyright (c) Rob Wittman 2016
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @package Shopify
 * @author Rob Wittman <rob@ihsdigital.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/report
 */
namespace Shopify\Object;

use Shopify\Concerns\HasId;

class Report extends AbstractObject
{
    use HasId;

    public static function getApiHandle()
    {
        return 'reports';
    }

    /**
     * The category for the report. The value returned by the API is "custom_app_reports".
     * @var string
     */
    protected $category;

    /**
     * The name of the report. Limit of 255 characters.
     * @var string
     */
    protected $name;

    /**
     * The ShopifyQL query that generates the report.
     * @see https://help.shopify.com/api/reference/shopify-ql
     * @var string
     */
    protected $shopify_ql;

    public function getCategory()
    {
        return $this->get('category');
    }

    public function setCategory($category)
    {
        $this->set('category', $category);
        return $this;
    }

    public function getName()
    {
        return $this->get('name');
    }

    public function setName($name)
    {
        $this->set('name', $name);
        return $this;
    }

    public function getShopifyQl()
    {
        return $this->get('shopify_ql');
    }

    public function setShopifyQl($shopify_ql)
    {
        $this->set('shopify_ql', $shopify_ql);
        return $this;
    }
}

<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Report;
use Shopify\Options\Report\GetOptions;
use Shopify\Options\Report\ListOptions;

class ReportService extends AbstractService
{
    /**
     * Retrieve a list of all Reports
     * @link https://help.shopify.com/api/reference/report#index
     * @param  ListOptions $options
     * @return Report[]
     */
    public function all(ListOptions $options = null)
    {
        $request = $this->createRequest('/admin/reports.json');
        return $this->getEdge($request, $options, Report::class);
    }

    /**
     * Receive a single report
     * @link https://help.shopify.com/api/reference/report#show
     * @param  integer $reportId
     * @param  GetOptions $options
     * @return Report
     */
    public function get($reportId, GetOptions $options = null)
    {
        $request = $this->createRequest('/admin/reports/'.$reportId.'.json');
        return $this->getNode($request, $options, Report::class);
    }

    /**
     * Create a new Report
     * @link https://help.shopify.com/api/reference/report#create
     * @param  Report $report
     * @return void
     */
    public function create(Report &$report)
    {
        $data = $report->exportData();
        $request = $this->createRequest('/admin/reports.json', static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'report' => $data
        ));
        $report->setData($response->report);
    }

    /**
     * Modify an existing Report
     * @link https://help.shopify.com/api/reference/report#update
     * @param  Report $report
     * @return void
     */
    public function update(Report &$report)
    {
        $data = $report->exportData();
        $request = $this->createRequest('/admin/reports/'.$report->getId()'.json', static::REQUEST_METHOD_PUT);
        $response = $this->send($request, array(
            'report' => $data
        ));
        $report->setData($response->report);
    }

    /**
     * Remove a previously created Report
     * @link https://help.shopify.com/api/reference/report#destroy
     * @param  Report $report
     * @return void
     */
    public function delete(Report $report)
    {
        $request = $this->createRequest('/admin/reports/'.$report->getId().'.json');
        $this->send($request);
    }
}

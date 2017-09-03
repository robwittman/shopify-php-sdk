<?php

namespace Shopify\Service;

use Shopify\Object\Report;

class ReportService extends AbstractService
{
    /**
     * Retrieve a list of all Reports
     *
     * @link   https://help.shopify.com/api/reference/report#index
     * @param  array $params
     * @return Report[]
     */
    public function all(array $params = array())
    {
        $request = $this->createRequest('/admin/reports.json');
        return $this->getEdge($request, $params, Report::class);
    }

    /**
     * Receive a single report
     *
     * @link   https://help.shopify.com/api/reference/report#show
     * @param  integer $reportId
     * @param  array   $params
     * @return Report
     */
    public function get($reportId, array $params = array())
    {
        $request = $this->createRequest('/admin/reports/'.$reportId.'.json');
        return $this->getNode($request, $params, Report::class);
    }

    /**
     * Create a new Report
     *
     * @link   https://help.shopify.com/api/reference/report#create
     * @param  Report $report
     * @return void
     */
    public function create(Report &$report)
    {
        $data = $report->exportData();
        $request = $this->createRequest('/admin/reports.json', static::REQUEST_METHOD_POST);
        $response = $this->send(
            $request, array(
            'report' => $data
            )
        );
        $report->setData($response->report);
    }

    /**
     * Modify an existing Report
     *
     * @link   https://help.shopify.com/api/reference/report#update
     * @param  Report $report
     * @return void
     */
    public function update(Report &$report)
    {
        $data = $report->exportData();
        $request = $this->createRequest('/admin/reports/'.$report->getId().'.json', static::REQUEST_METHOD_PUT);
        $response = $this->send(
            $request, array(
            'report' => $data
            )
        );
        $report->setData($response->report);
    }

    /**
     * Remove a previously created Report
     *
     * @link   https://help.shopify.com/api/reference/report#destroy
     * @param  Report $report
     * @return void
     */
    public function delete(Report $report)
    {
        $request = $this->createRequest('/admin/reports/'.$report->getId().'.json');
        $this->send($request);
    }
}

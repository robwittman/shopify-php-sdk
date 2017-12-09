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
        $endpoint = '/admin/reports.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Report::class, $response['reports']);
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
        $endpoint = '/admin/reports/'.$reportId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(Report::class, $response['report']);
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
        $endpoint = '/admin/reports.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'report' => $data
            )
        );
        $report->setData($response['report']);
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
        $endpoint = '/admin/reports/'.$report->id.'.json';
        $response = $this->request(
            $endpoint, 'PUT', array(
            'report' => $data
            )
        );
        $report->setData($response['report']);
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
         $this->request('/admin/reports/'.$report->id.'.json', 'DELETE');
         return;
    }
}

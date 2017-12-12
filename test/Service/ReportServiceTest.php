<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Object\Report;
use Shopify\Service\ReportService;

class ReportServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/ReportsList.json');
        $service = new ReportService($api);
        $reports = $service->all();
        $this->assertContainsOnlyInstancesOf(
            Report::class,
            $reports
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/Report.json');
        $service = new ReportService($api);
        $report = $service->get(1234);
        $this->assertInstanceOf(Report::class, $report);
    }
}

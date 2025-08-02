<?php

/**
 * @apiGroup           RevenueReport
 * @apiName            findRevenueReportById
 *
 * @api                {GET} /v1/revenue_report/:id Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->get('revenue_report/{id}', [
    'as' => 'api_revenuereport_find_revenue_report_by_id',
    'uses'  => 'Controller@findRevenueReportById',
    'middleware' => [
      'auth:api',
    ],
]);

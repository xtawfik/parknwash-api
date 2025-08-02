<?php

/**
 * @apiGroup           RevenueReport
 * @apiName            getAllRevenueReports
 *
 * @api                {GET} /v1/revenue_report Endpoint title here..
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
$router->get('revenue_report', [
    'as' => 'api_revenuereport_get_all_revenue_reports',
    'uses'  => 'Controller@getAllRevenueReports',
    'middleware' => [
      'auth:api',
    ],
]);

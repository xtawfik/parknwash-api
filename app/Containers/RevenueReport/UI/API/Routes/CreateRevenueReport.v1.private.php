<?php

/**
 * @apiGroup           RevenueReport
 * @apiName            createRevenueReport
 *
 * @api                {POST} /v1/revenue_report Endpoint title here..
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
$router->post('revenue_report', [
    'as' => 'api_revenuereport_create_revenue_report',
    'uses'  => 'Controller@createRevenueReport',
    'middleware' => [
      'auth:api',
    ],
]);

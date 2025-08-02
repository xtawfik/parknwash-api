<?php

/**
 * @apiGroup           RevenueReport
 * @apiName            updateRevenueReport
 *
 * @api                {POST} /v1/revenue_report/:id Endpoint title here..
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
$router->post('revenue_report/{id}', [
    'as' => 'api_revenuereport_update_revenue_report',
    'uses'  => 'Controller@updateRevenueReport',
    'middleware' => [
      'auth:api',
    ],
]);

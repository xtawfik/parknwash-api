<?php

/**
 * @apiGroup           RevenueReport
 * @apiName            deleteRevenueReport
 *
 * @api                {DELETE} /v1/revenue_report/:id Endpoint title here..
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
$router->delete('revenue_report/{id}', [
    'as' => 'api_revenuereport_delete_revenue_report',
    'uses'  => 'Controller@deleteRevenueReport',
    'middleware' => [
      'auth:api',
    ],
]);

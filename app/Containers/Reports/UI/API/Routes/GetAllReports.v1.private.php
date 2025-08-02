<?php

/**
 * @apiGroup           Reports
 * @apiName            getAllReports
 *
 * @api                {GET} /v1/reports Endpoint title here..
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
$router->get('reports', [
    'as' => 'api_reports_get_all_reports',
    'uses'  => 'Controller@getAllReports',
    'middleware' => [
      'auth:api',
    ],
]);

$router->post('reports', [
    'as' => 'api_reports_get_all_reports',
    'uses'  => 'Controller@getAllReports',
    'middleware' => [
      'auth:api',
    ],
]);

$router->get('update-car-models', [
    'as' => 'api_reports_get_all_reports',
    'uses'  => 'Controller@updateCarModels',
    'middleware' => [
//      'auth:api',
    ],
]);

$router->post('excel/export', [
    'as' => 'api_export_excel',
    'uses'  => 'Controller@exportExcel',
    'middleware' => [
      'auth:api',
    ],
]);

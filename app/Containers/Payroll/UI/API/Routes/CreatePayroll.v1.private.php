<?php

/**
 * @apiGroup           Payroll
 * @apiName            createPayroll
 *
 * @api                {POST} /v1/payroll Endpoint title here..
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
$router->post('payroll', [
    'as' => 'api_payroll_create_payroll',
    'uses'  => 'Controller@createPayroll',
    'middleware' => [
      'auth:api',
    ],
]);

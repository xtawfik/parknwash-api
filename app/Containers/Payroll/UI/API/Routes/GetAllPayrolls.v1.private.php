<?php

/**
 * @apiGroup           Payroll
 * @apiName            getAllPayrolls
 *
 * @api                {GET} /v1/payroll Endpoint title here..
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
$router->get('payroll', [
    'as' => 'api_payroll_get_all_payrolls',
    'uses'  => 'Controller@getAllPayrolls',
    'middleware' => [
      'auth:api',
    ],
]);

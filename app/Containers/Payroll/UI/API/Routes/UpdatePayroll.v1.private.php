<?php

/**
 * @apiGroup           Payroll
 * @apiName            updatePayroll
 *
 * @api                {POST} /v1/payroll/:id Endpoint title here..
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
$router->post('payroll/{id}', [
    'as' => 'api_payroll_update_payroll',
    'uses'  => 'Controller@updatePayroll',
    'middleware' => [
      'auth:api',
    ],
]);

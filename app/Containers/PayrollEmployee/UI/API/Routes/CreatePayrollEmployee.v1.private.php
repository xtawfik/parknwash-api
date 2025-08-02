<?php

/**
 * @apiGroup           PayrollEmployee
 * @apiName            createPayrollEmployee
 *
 * @api                {POST} /v1/payroll_employee Endpoint title here..
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
$router->post('payroll_employee', [
    'as' => 'api_payrollemployee_create_payroll_employee',
    'uses'  => 'Controller@createPayrollEmployee',
    'middleware' => [
      'auth:api',
    ],
]);

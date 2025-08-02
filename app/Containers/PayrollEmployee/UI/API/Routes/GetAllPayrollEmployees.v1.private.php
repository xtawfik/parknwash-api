<?php

/**
 * @apiGroup           PayrollEmployee
 * @apiName            getAllPayrollEmployees
 *
 * @api                {GET} /v1/payroll_employee Endpoint title here..
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
$router->get('payroll_employee', [
    'as' => 'api_payrollemployee_get_all_payroll_employees',
    'uses'  => 'Controller@getAllPayrollEmployees',
    'middleware' => [
      'auth:api',
    ],
]);

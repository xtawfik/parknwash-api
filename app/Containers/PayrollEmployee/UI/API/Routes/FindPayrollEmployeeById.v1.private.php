<?php

/**
 * @apiGroup           PayrollEmployee
 * @apiName            findPayrollEmployeeById
 *
 * @api                {GET} /v1/payroll_employee/:id Endpoint title here..
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
$router->get('payroll_employee/{id}', [
    'as' => 'api_payrollemployee_find_payroll_employee_by_id',
    'uses'  => 'Controller@findPayrollEmployeeById',
    'middleware' => [
      'auth:api',
    ],
]);

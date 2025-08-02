<?php

/**
 * @apiGroup           EmployeeDeduction
 * @apiName            getAllEmployeeDeductions
 *
 * @api                {GET} /v1/employee_deduction Endpoint title here..
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
$router->get('employee_deduction', [
    'as' => 'api_employeededuction_get_all_employee_deductions',
    'uses'  => 'Controller@getAllEmployeeDeductions',
    'middleware' => [
      'auth:api',
    ],
]);

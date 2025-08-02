<?php

/**
 * @apiGroup           EmployeeDeduction
 * @apiName            createEmployeeDeduction
 *
 * @api                {POST} /v1/employee_deduction Endpoint title here..
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
$router->post('employee_deduction', [
    'as' => 'api_employeededuction_create_employee_deduction',
    'uses'  => 'Controller@createEmployeeDeduction',
    'middleware' => [
      'auth:api',
    ],
]);

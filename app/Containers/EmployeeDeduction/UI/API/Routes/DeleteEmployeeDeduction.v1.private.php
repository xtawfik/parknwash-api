<?php

/**
 * @apiGroup           EmployeeDeduction
 * @apiName            deleteEmployeeDeduction
 *
 * @api                {DELETE} /v1/employee_deduction/:id Endpoint title here..
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
$router->delete('employee_deduction/{id}', [
    'as' => 'api_employeededuction_delete_employee_deduction',
    'uses'  => 'Controller@deleteEmployeeDeduction',
    'middleware' => [
      'auth:api',
    ],
]);

<?php

/**
 * @apiGroup           EmployeeDeduction
 * @apiName            updateEmployeeDeduction
 *
 * @api                {POST} /v1/employee_deduction/:id Endpoint title here..
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
$router->post('employee_deduction/{id}', [
    'as' => 'api_employeededuction_update_employee_deduction',
    'uses'  => 'Controller@updateEmployeeDeduction',
    'middleware' => [
      'auth:api',
    ],
]);

<?php

/**
 * @apiGroup           EmployeeExpense
 * @apiName            createEmployeeExpense
 *
 * @api                {POST} /v1/employee_expense Endpoint title here..
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
$router->post('employee_expense', [
    'as' => 'api_employeeexpense_create_employee_expense',
    'uses'  => 'Controller@createEmployeeExpense',
    'middleware' => [
      'auth:api',
    ],
]);

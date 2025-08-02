<?php

/**
 * @apiGroup           EmployeeExpense
 * @apiName            deleteEmployeeExpense
 *
 * @api                {DELETE} /v1/employee_expense/:id Endpoint title here..
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
$router->delete('employee_expense/{id}', [
    'as' => 'api_employeeexpense_delete_employee_expense',
    'uses'  => 'Controller@deleteEmployeeExpense',
    'middleware' => [
      'auth:api',
    ],
]);

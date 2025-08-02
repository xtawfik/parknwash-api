<?php

/**
 * @apiGroup           EmployeeExpense
 * @apiName            findEmployeeExpenseById
 *
 * @api                {GET} /v1/employee_expense/:id Endpoint title here..
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
$router->get('employee_expense/{id}', [
    'as' => 'api_employeeexpense_find_employee_expense_by_id',
    'uses'  => 'Controller@findEmployeeExpenseById',
    'middleware' => [
      'auth:api',
    ],
]);

<?php

/**
 * @apiGroup           EmployeeExpense
 * @apiName            getAllEmployeeExpenses
 *
 * @api                {GET} /v1/employee_expense Endpoint title here..
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
$router->get('employee_expense', [
    'as' => 'api_employeeexpense_get_all_employee_expenses',
    'uses'  => 'Controller@getAllEmployeeExpenses',
    'middleware' => [
      'auth:api',
    ],
]);

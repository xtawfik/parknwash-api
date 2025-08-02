<?php

/**
 * @apiGroup           EmployeeDeduction
 * @apiName            findEmployeeDeductionById
 *
 * @api                {GET} /v1/employee_deduction/:id Endpoint title here..
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
$router->get('employee_deduction/{id}', [
    'as' => 'api_employeededuction_find_employee_deduction_by_id',
    'uses'  => 'Controller@findEmployeeDeductionById',
    'middleware' => [
      'auth:api',
    ],
]);

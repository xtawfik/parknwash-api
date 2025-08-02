<?php

/**
 * @apiGroup           Employee
 * @apiName            findEmployeeById
 *
 * @api                {GET} /v1/employee/:id Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
 * {
 * // Insert the response of the request here...
 * }
 */

/** @var Route $router */
$router->get('employee/clone', [
  'as' => 'api_employee_clone_employee_by_id',
  'uses' => 'Controller@cloneEmployees',
  'middleware' => [
//      'auth:api',
  ],
]);

$router->get('employee/stats', [
  'as' => 'api_employee_get_all_employees_stats',
  'uses' => 'Controller@getAllEmployeesStats',
  'middleware' => [
    'auth:api',
  ],
]);


$router->get('employee/sales_stats', [
  'as' => 'api_employee_get_all_employees_sales_stats',
  'uses' => 'Controller@getAllEmployeeSalesStats',
  'middleware' => [
    'auth:api',
  ],
]);

$router->get('employee/fixduplicates', [
  'as' => 'api_employee_fix_duplicates',
  'uses' => 'Controller@fixDuplicates',
  'middleware' => [
//      'auth:api',
  ],
]);

$router->get('employee/{id}', [
  'as' => 'api_employee_find_employee_by_id',
  'uses' => 'Controller@findEmployeeById',
  'middleware' => [
    'auth:api',
  ],
]);

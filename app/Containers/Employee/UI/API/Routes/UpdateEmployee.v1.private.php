<?php

/**
 * @apiGroup           Employee
 * @apiName            updateEmployee
 *
 * @api                {POST} /v1/employee/:id Endpoint title here..
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
$router->post('employee/{id}', [
    'as' => 'api_employee_update_employee',
    'uses'  => 'Controller@updateEmployee',
    'middleware' => [
      'auth:api',
    ],
]);

$router->post('check_user_by_employee_id', [
  'as' => 'api_employee_check_user_by_employee_id',
  'uses' => 'Controller@checkUserByEmployeeId',
  'middleware' => [
    'auth:api',
  ],
]);

$router->post('users_create_from_employee', [
  'as' => 'api_employee_users_create_from_employee',
  'uses' => 'Controller@usersCreateFromEmployee',
  'middleware' => [
    'auth:api',
  ],
]);

$router->post('users_connect_from_employee', [
  'as' => 'api_employee_users_connect_from_employee',
  'uses' => 'Controller@usersConnectFromEmployee',
  'middleware' => [
    'auth:api',
  ],
]);

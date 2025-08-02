<?php

/**
 * @apiGroup           Employee
 * @apiName            deleteEmployee
 *
 * @api                {DELETE} /v1/employee/:id Endpoint title here..
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
$router->delete('employee/{id}', [
    'as' => 'api_employee_delete_employee',
    'uses'  => 'Controller@deleteEmployee',
    'middleware' => [
      'auth:api',
    ],
]);

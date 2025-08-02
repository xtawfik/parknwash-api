<?php

/**
 * @apiGroup           EmployeeTermination
 * @apiName            deleteEmployeeTermination
 *
 * @api                {DELETE} /v1/employee_termination/:id Endpoint title here..
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
$router->delete('employee_termination/{id}', [
    'as' => 'api_employeetermination_delete_employee_termination',
    'uses'  => 'Controller@deleteEmployeeTermination',
    'middleware' => [
      'auth:api',
    ],
]);

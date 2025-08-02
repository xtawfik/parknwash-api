<?php

/**
 * @apiGroup           EmployeeCost
 * @apiName            deleteEmployeeCost
 *
 * @api                {DELETE} /v1/employee_cost/:id Endpoint title here..
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
$router->delete('employee_cost/{id}', [
    'as' => 'api_employeecost_delete_employee_cost',
    'uses'  => 'Controller@deleteEmployeeCost',
    'middleware' => [
      'auth:api',
    ],
]);

<?php

/**
 * @apiGroup           EmployeeCost
 * @apiName            updateEmployeeCost
 *
 * @api                {POST} /v1/employee_cost/:id Endpoint title here..
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
$router->post('employee_cost/{id}', [
    'as' => 'api_employeecost_update_employee_cost',
    'uses'  => 'Controller@updateEmployeeCost',
    'middleware' => [
      'auth:api',
    ],
]);

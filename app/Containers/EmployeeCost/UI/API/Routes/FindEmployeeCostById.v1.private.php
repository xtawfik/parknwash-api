<?php

/**
 * @apiGroup           EmployeeCost
 * @apiName            findEmployeeCostById
 *
 * @api                {GET} /v1/employee_cost/:id Endpoint title here..
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
$router->get('employee_cost/{id}', [
    'as' => 'api_employeecost_find_employee_cost_by_id',
    'uses'  => 'Controller@findEmployeeCostById',
    'middleware' => [
      'auth:api',
    ],
]);

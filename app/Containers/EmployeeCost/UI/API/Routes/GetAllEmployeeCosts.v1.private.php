<?php

/**
 * @apiGroup           EmployeeCost
 * @apiName            getAllEmployeeCosts
 *
 * @api                {GET} /v1/employee_cost Endpoint title here..
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
$router->get('employee_cost', [
    'as' => 'api_employeecost_get_all_employee_costs',
    'uses'  => 'Controller@getAllEmployeeCosts',
    'middleware' => [
      'auth:api',
    ],
]);

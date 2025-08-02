<?php

/**
 * @apiGroup           EmployeeTermination
 * @apiName            getAllEmployeeTerminations
 *
 * @api                {GET} /v1/employee_termination Endpoint title here..
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
$router->get('employee_termination', [
    'as' => 'api_employeetermination_get_all_employee_terminations',
    'uses'  => 'Controller@getAllEmployeeTerminations',
    'middleware' => [
      'auth:api',
    ],
]);

<?php

/**
 * @apiGroup           Employee
 * @apiName            getAllEmployees
 *
 * @api                {GET} /v1/employee Endpoint title here..
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
$router->get('employee', [
    'as' => 'api_employee_get_all_employees',
    'uses'  => 'Controller@getAllEmployees',
    'middleware' => [
      'auth:api',
    ],
]);

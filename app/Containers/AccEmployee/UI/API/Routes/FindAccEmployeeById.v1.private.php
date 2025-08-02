<?php

/**
 * @apiGroup           AccEmployee
 * @apiName            findAccEmployeeById
 *
 * @api                {GET} /v1/acc_employee/:id Endpoint title here..
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
$router->get('acc_employee/{id}', [
    'as' => 'api_accemployee_find_acc_employee_by_id',
    'uses'  => 'Controller@findAccEmployeeById',
    'middleware' => [
      'auth:api',
    ],
]);

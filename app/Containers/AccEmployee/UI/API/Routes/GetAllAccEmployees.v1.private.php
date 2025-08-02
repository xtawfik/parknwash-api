<?php

/**
 * @apiGroup           AccEmployee
 * @apiName            getAllAccEmployees
 *
 * @api                {GET} /v1/acc_employee Endpoint title here..
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
$router->get('acc_employee', [
    'as' => 'api_accemployee_get_all_acc_employees',
    'uses'  => 'Controller@getAllAccEmployees',
    'middleware' => [
      'auth:api',
    ],
]);

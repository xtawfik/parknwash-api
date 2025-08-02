<?php

/**
 * @apiGroup           AccEmployee
 * @apiName            createAccEmployee
 *
 * @api                {POST} /v1/acc_employee Endpoint title here..
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
$router->post('acc_employee', [
    'as' => 'api_accemployee_create_acc_employee',
    'uses'  => 'Controller@createAccEmployee',
    'middleware' => [
      'auth:api',
    ],
]);

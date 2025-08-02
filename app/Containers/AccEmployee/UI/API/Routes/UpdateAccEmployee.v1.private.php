<?php

/**
 * @apiGroup           AccEmployee
 * @apiName            updateAccEmployee
 *
 * @api                {POST} /v1/acc_employee/:id Endpoint title here..
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
$router->post('acc_employee/{id}', [
    'as' => 'api_accemployee_update_acc_employee',
    'uses'  => 'Controller@updateAccEmployee',
    'middleware' => [
      'auth:api',
    ],
]);

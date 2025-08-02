<?php

/**
 * @apiGroup           AccControlAccount
 * @apiName            deleteAccControlAccount
 *
 * @api                {DELETE} /v1/acc_control_account/:id Endpoint title here..
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
$router->delete('acc_control_account/{id}', [
    'as' => 'api_acccontrolaccount_delete_acc_control_account',
    'uses'  => 'Controller@deleteAccControlAccount',
    'middleware' => [
      'auth:api',
    ],
]);

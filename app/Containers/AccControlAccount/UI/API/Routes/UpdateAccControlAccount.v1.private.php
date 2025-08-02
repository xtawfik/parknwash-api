<?php

/**
 * @apiGroup           AccControlAccount
 * @apiName            updateAccControlAccount
 *
 * @api                {POST} /v1/acc_control_account/:id Endpoint title here..
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
$router->post('acc_control_account/{id}', [
    'as' => 'api_acccontrolaccount_update_acc_control_account',
    'uses'  => 'Controller@updateAccControlAccount',
    'middleware' => [
      'auth:api',
    ],
]);

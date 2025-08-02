<?php

/**
 * @apiGroup           AccControlAccount
 * @apiName            findAccControlAccountById
 *
 * @api                {GET} /v1/acc_control_account/:id Endpoint title here..
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
$router->get('acc_control_account/{id}', [
    'as' => 'api_acccontrolaccount_find_acc_control_account_by_id',
    'uses'  => 'Controller@findAccControlAccountById',
    'middleware' => [
      'auth:api',
    ],
]);

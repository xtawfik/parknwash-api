<?php

/**
 * @apiGroup           AccControlAccount
 * @apiName            getAllAccControlAccounts
 *
 * @api                {GET} /v1/acc_control_account Endpoint title here..
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
$router->get('acc_control_account', [
    'as' => 'api_acccontrolaccount_get_all_acc_control_accounts',
    'uses'  => 'Controller@getAllAccControlAccounts',
    'middleware' => [
      'auth:api',
    ],
]);

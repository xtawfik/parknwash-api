<?php

/**
 * @apiGroup           AccSpecialAccount
 * @apiName            getAllAccSpecialAccounts
 *
 * @api                {GET} /v1/acc_special_account Endpoint title here..
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
$router->get('acc_special_account', [
    'as' => 'api_accspecialaccount_get_all_acc_special_accounts',
    'uses'  => 'Controller@getAllAccSpecialAccounts',
    'middleware' => [
      'auth:api',
    ],
]);

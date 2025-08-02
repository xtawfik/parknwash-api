<?php

/**
 * @apiGroup           AccClearedBalance
 * @apiName            getAllAccClearedBalances
 *
 * @api                {GET} /v1/acc_cleared_balance Endpoint title here..
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
$router->get('acc_cleared_balance', [
    'as' => 'api_accclearedbalance_get_all_acc_cleared_balances',
    'uses'  => 'Controller@getAllAccClearedBalances',
    'middleware' => [
      'auth:api',
    ],
]);

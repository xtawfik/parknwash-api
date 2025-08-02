<?php

/**
 * @apiGroup           AccProfitLossAccount
 * @apiName            createAccProfitLossAccount
 *
 * @api                {POST} /v1/acc_profit_loss_account Endpoint title here..
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
$router->post('acc_profit_loss_account', [
    'as' => 'api_accprofitlossaccount_create_acc_profit_loss_account',
    'uses'  => 'Controller@createAccProfitLossAccount',
    'middleware' => [
      'auth:api',
    ],
]);

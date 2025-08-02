<?php

/**
 * @apiGroup           AccProfitLossAccount
 * @apiName            findAccProfitLossAccountById
 *
 * @api                {GET} /v1/acc_profit_loss_account/:id Endpoint title here..
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
$router->get('acc_profit_loss_account/{id}', [
    'as' => 'api_accprofitlossaccount_find_acc_profit_loss_account_by_id',
    'uses'  => 'Controller@findAccProfitLossAccountById',
    'middleware' => [
      'auth:api',
    ],
]);

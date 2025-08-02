<?php

/**
 * @apiGroup           AccProfitLoss
 * @apiName            findAccProfitLossById
 *
 * @api                {GET} /v1/acc_profit_loss/:id Endpoint title here..
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
$router->get('acc_profit_loss/{id}', [
    'as' => 'api_accprofitloss_find_acc_profit_loss_by_id',
    'uses'  => 'Controller@findAccProfitLossById',
    'middleware' => [
      'auth:api',
    ],
]);

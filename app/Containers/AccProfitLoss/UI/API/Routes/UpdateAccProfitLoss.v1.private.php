<?php

/**
 * @apiGroup           AccProfitLoss
 * @apiName            updateAccProfitLoss
 *
 * @api                {POST} /v1/acc_profit_loss/:id Endpoint title here..
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
$router->post('acc_profit_loss/{id}', [
    'as' => 'api_accprofitloss_update_acc_profit_loss',
    'uses'  => 'Controller@updateAccProfitLoss',
    'middleware' => [
      'auth:api',
    ],
]);

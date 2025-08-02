<?php

/**
 * @apiGroup           AccProfitLoss
 * @apiName            getAllAccProfitLosses
 *
 * @api                {GET} /v1/acc_profit_loss Endpoint title here..
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
$router->get('acc_profit_loss', [
    'as' => 'api_accprofitloss_get_all_acc_profit_losses',
    'uses'  => 'Controller@getAllAccProfitLosses',
    'middleware' => [
      'auth:api',
    ],
]);

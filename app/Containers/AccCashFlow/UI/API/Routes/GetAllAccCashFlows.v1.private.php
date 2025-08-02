<?php

/**
 * @apiGroup           AccCashFlow
 * @apiName            getAllAccCashFlows
 *
 * @api                {GET} /v1/acc_cash_flow Endpoint title here..
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
$router->get('acc_cash_flow', [
    'as' => 'api_acccashflow_get_all_acc_cash_flows',
    'uses'  => 'Controller@getAllAccCashFlows',
    'middleware' => [
      'auth:api',
    ],
]);

<?php

/**
 * @apiGroup           AccCashFlow
 * @apiName            updateAccCashFlow
 *
 * @api                {POST} /v1/acc_cash_flow/:id Endpoint title here..
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
$router->post('acc_cash_flow/{id}', [
    'as' => 'api_acccashflow_update_acc_cash_flow',
    'uses'  => 'Controller@updateAccCashFlow',
    'middleware' => [
      'auth:api',
    ],
]);

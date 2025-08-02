<?php

/**
 * @apiGroup           AccCashFlow
 * @apiName            findAccCashFlowById
 *
 * @api                {GET} /v1/acc_cash_flow/:id Endpoint title here..
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
$router->get('acc_cash_flow/{id}', [
    'as' => 'api_acccashflow_find_acc_cash_flow_by_id',
    'uses'  => 'Controller@findAccCashFlowById',
    'middleware' => [
      'auth:api',
    ],
]);

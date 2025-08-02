<?php

/**
 * @apiGroup           AccCashFlowType
 * @apiName            deleteAccCashFlowType
 *
 * @api                {DELETE} /v1/acc_cash_flow_type/:id Endpoint title here..
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
$router->delete('acc_cash_flow_type/{id}', [
    'as' => 'api_acccashflowtype_delete_acc_cash_flow_type',
    'uses'  => 'Controller@deleteAccCashFlowType',
    'middleware' => [
      'auth:api',
    ],
]);

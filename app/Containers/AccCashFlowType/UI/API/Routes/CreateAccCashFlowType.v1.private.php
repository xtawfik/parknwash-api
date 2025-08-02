<?php

/**
 * @apiGroup           AccCashFlowType
 * @apiName            createAccCashFlowType
 *
 * @api                {POST} /v1/acc_cash_flow_type Endpoint title here..
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
$router->post('acc_cash_flow_type', [
    'as' => 'api_acccashflowtype_create_acc_cash_flow_type',
    'uses'  => 'Controller@createAccCashFlowType',
    'middleware' => [
      'auth:api',
    ],
]);

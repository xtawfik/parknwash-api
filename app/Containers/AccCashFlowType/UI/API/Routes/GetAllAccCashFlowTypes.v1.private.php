<?php

/**
 * @apiGroup           AccCashFlowType
 * @apiName            getAllAccCashFlowTypes
 *
 * @api                {GET} /v1/acc_cash_flow_type Endpoint title here..
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
$router->get('acc_cash_flow_type', [
    'as' => 'api_acccashflowtype_get_all_acc_cash_flow_types',
    'uses'  => 'Controller@getAllAccCashFlowTypes',
    'middleware' => [
      'auth:api',
    ],
]);

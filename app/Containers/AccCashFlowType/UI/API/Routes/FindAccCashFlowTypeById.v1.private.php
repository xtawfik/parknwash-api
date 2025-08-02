<?php

/**
 * @apiGroup           AccCashFlowType
 * @apiName            findAccCashFlowTypeById
 *
 * @api                {GET} /v1/acc_cash_flow_type/:id Endpoint title here..
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
$router->get('acc_cash_flow_type/{id}', [
    'as' => 'api_acccashflowtype_find_acc_cash_flow_type_by_id',
    'uses'  => 'Controller@findAccCashFlowTypeById',
    'middleware' => [
      'auth:api',
    ],
]);

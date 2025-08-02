<?php

/**
 * @apiGroup           AccProductionOrder
 * @apiName            findAccProductionOrderById
 *
 * @api                {GET} /v1/acc_production_order/:id Endpoint title here..
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
$router->get('acc_production_order/{id}', [
    'as' => 'api_accproductionorder_find_acc_production_order_by_id',
    'uses'  => 'Controller@findAccProductionOrderById',
    'middleware' => [
      'auth:api',
    ],
]);

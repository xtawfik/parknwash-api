<?php

/**
 * @apiGroup           AccPurchaseOrder
 * @apiName            findAccPurchaseOrderById
 *
 * @api                {GET} /v1/acc_purchase_order/:id Endpoint title here..
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
$router->get('acc_purchase_order/{id}', [
    'as' => 'api_accpurchaseorder_find_acc_purchase_order_by_id',
    'uses'  => 'Controller@findAccPurchaseOrderById',
    'middleware' => [
      'auth:api',
    ],
]);

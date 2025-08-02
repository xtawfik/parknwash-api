<?php

/**
 * @apiGroup           AccPurchaseOrder
 * @apiName            getAllAccPurchaseOrders
 *
 * @api                {GET} /v1/acc_purchase_order Endpoint title here..
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
$router->get('acc_purchase_order', [
    'as' => 'api_accpurchaseorder_get_all_acc_purchase_orders',
    'uses'  => 'Controller@getAllAccPurchaseOrders',
    'middleware' => [
      'auth:api',
    ],
]);

<?php

/**
 * @apiGroup           AccPurchaseOrder
 * @apiName            deleteAccPurchaseOrder
 *
 * @api                {DELETE} /v1/acc_purchase_order/:id Endpoint title here..
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
$router->delete('acc_purchase_order/{id}', [
    'as' => 'api_accpurchaseorder_delete_acc_purchase_order',
    'uses'  => 'Controller@deleteAccPurchaseOrder',
    'middleware' => [
      'auth:api',
    ],
]);

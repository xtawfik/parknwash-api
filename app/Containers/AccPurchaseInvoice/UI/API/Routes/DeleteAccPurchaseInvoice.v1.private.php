<?php

/**
 * @apiGroup           AccPurchaseInvoice
 * @apiName            deleteAccPurchaseInvoice
 *
 * @api                {DELETE} /v1/acc_purchase_invoice/:id Endpoint title here..
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
$router->delete('acc_purchase_invoice/{id}', [
    'as' => 'api_accpurchaseinvoice_delete_acc_purchase_invoice',
    'uses'  => 'Controller@deleteAccPurchaseInvoice',
    'middleware' => [
      'auth:api',
    ],
]);

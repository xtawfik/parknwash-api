<?php

/**
 * @apiGroup           AccPurchaseInvoice
 * @apiName            getAllAccPurchaseInvoices
 *
 * @api                {GET} /v1/acc_purchase_invoice Endpoint title here..
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
$router->get('acc_purchase_invoice', [
    'as' => 'api_accpurchaseinvoice_get_all_acc_purchase_invoices',
    'uses'  => 'Controller@getAllAccPurchaseInvoices',
    'middleware' => [
      'auth:api',
    ],
]);

<?php

/**
 * @apiGroup           AccSalesInvoice
 * @apiName            getAllAccSalesInvoices
 *
 * @api                {GET} /v1/acc_sales_invoice Endpoint title here..
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
$router->get('acc_sales_invoice', [
    'as' => 'api_accsalesinvoice_get_all_acc_sales_invoices',
    'uses'  => 'Controller@getAllAccSalesInvoices',
    'middleware' => [
      'auth:api',
    ],
]);

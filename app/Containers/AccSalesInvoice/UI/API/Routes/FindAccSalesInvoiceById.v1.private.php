<?php

/**
 * @apiGroup           AccSalesInvoice
 * @apiName            findAccSalesInvoiceById
 *
 * @api                {GET} /v1/acc_sales_invoice/:id Endpoint title here..
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
$router->get('acc_sales_invoice/{id}', [
    'as' => 'api_accsalesinvoice_find_acc_sales_invoice_by_id',
    'uses'  => 'Controller@findAccSalesInvoiceById',
    'middleware' => [
      'auth:api',
    ],
]);

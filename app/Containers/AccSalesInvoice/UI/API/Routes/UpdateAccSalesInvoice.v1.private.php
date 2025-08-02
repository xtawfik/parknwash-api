<?php

/**
 * @apiGroup           AccSalesInvoice
 * @apiName            updateAccSalesInvoice
 *
 * @api                {POST} /v1/acc_sales_invoice/:id Endpoint title here..
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
$router->post('acc_sales_invoice/{id}', [
    'as' => 'api_accsalesinvoice_update_acc_sales_invoice',
    'uses'  => 'Controller@updateAccSalesInvoice',
    'middleware' => [
      'auth:api',
    ],
]);

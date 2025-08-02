<?php

/**
 * @apiGroup           SupplyInvoice
 * @apiName            findSupplyInvoiceById
 *
 * @api                {GET} /v1/supply_invoice/:id Endpoint title here..
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
$router->get('supply_invoice/{id}', [
    'as' => 'api_supplyinvoice_find_supply_invoice_by_id',
    'uses'  => 'Controller@findSupplyInvoiceById',
    'middleware' => [
      'auth:api',
    ],
]);

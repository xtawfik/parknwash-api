<?php

/**
 * @apiGroup           SupplyInvoice
 * @apiName            deleteSupplyInvoice
 *
 * @api                {DELETE} /v1/supply_invoice/:id Endpoint title here..
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
$router->delete('supply_invoice/{id}', [
    'as' => 'api_supplyinvoice_delete_supply_invoice',
    'uses'  => 'Controller@deleteSupplyInvoice',
    'middleware' => [
      'auth:api',
    ],
]);

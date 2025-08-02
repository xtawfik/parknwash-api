<?php

/**
 * @apiGroup           SupplyInvoice
 * @apiName            updateSupplyInvoice
 *
 * @api                {POST} /v1/supply_invoice/:id Endpoint title here..
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
$router->post('supply_invoice/{id}', [
    'as' => 'api_supplyinvoice_update_supply_invoice',
    'uses'  => 'Controller@updateSupplyInvoice',
    'middleware' => [
      'auth:api',
    ],
]);

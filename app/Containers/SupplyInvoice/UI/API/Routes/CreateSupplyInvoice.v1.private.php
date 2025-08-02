<?php

/**
 * @apiGroup           SupplyInvoice
 * @apiName            createSupplyInvoice
 *
 * @api                {POST} /v1/supply_invoice Endpoint title here..
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
$router->post('supply_invoice', [
    'as' => 'api_supplyinvoice_create_supply_invoice',
    'uses'  => 'Controller@createSupplyInvoice',
    'middleware' => [
      'auth:api',
    ],
]);

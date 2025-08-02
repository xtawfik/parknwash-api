<?php

/**
 * @apiGroup           SupplyCountry
 * @apiName            updateSupplyCountry
 *
 * @api                {POST} /v1/supply_country/:id Endpoint title here..
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
$router->post('supply_country/{id}', [
    'as' => 'api_supplycountry_update_supply_country',
    'uses'  => 'Controller@updateSupplyCountry',
    'middleware' => [
      'auth:api',
    ],
]);

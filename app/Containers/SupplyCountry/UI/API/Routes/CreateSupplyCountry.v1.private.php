<?php

/**
 * @apiGroup           SupplyCountry
 * @apiName            createSupplyCountry
 *
 * @api                {POST} /v1/supply_country Endpoint title here..
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
$router->post('supply_country', [
    'as' => 'api_supplycountry_create_supply_country',
    'uses'  => 'Controller@createSupplyCountry',
    'middleware' => [
      'auth:api',
    ],
]);

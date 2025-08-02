<?php

/**
 * @apiGroup           SupplyCountry
 * @apiName            getAllSupplyCountries
 *
 * @api                {GET} /v1/supply_country Endpoint title here..
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
$router->get('supply_country', [
    'as' => 'api_supplycountry_get_all_supply_countries',
    'uses'  => 'Controller@getAllSupplyCountries',
    'middleware' => [
      'auth:api',
    ],
]);

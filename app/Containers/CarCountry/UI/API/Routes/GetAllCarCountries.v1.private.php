<?php

/**
 * @apiGroup           CarCountry
 * @apiName            getAllCarCountries
 *
 * @api                {GET} /v1/car_country Endpoint title here..
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
$router->get('car_country', [
    'as' => 'api_carcountry_get_all_car_countries',
    'uses'  => 'Controller@getAllCarCountries',
    'middleware' => [
      'auth:api',
    ],
]);

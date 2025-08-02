<?php

/**
 * @apiGroup           CarCountry
 * @apiName            findCarCountryById
 *
 * @api                {GET} /v1/car_country/:id Endpoint title here..
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
$router->get('car_country/{id}', [
    'as' => 'api_carcountry_find_car_country_by_id',
    'uses'  => 'Controller@findCarCountryById',
    'middleware' => [
      'auth:api',
    ],
]);

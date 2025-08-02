<?php

/**
 * @apiGroup           City
 * @apiName            getAllCities
 *
 * @api                {GET} /v1/city Endpoint title here..
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
$router->get('city', [
    'as' => 'api_city_get_all_cities',
    'uses'  => 'Controller@getAllCities',
    'middleware' => [
      'auth:api',
    ],
]);

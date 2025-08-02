<?php

/**
 * @apiGroup           CarCountry
 * @apiName            deleteCarCountry
 *
 * @api                {DELETE} /v1/car_country/:id Endpoint title here..
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
$router->delete('car_country/{id}', [
    'as' => 'api_carcountry_delete_car_country',
    'uses'  => 'Controller@deleteCarCountry',
    'middleware' => [
      'auth:api',
    ],
]);

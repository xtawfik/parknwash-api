<?php

/**
 * @apiGroup           CarCountry
 * @apiName            updateCarCountry
 *
 * @api                {POST} /v1/car_country/:id Endpoint title here..
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
$router->post('car_country/{id}', [
    'as' => 'api_carcountry_update_car_country',
    'uses'  => 'Controller@updateCarCountry',
    'middleware' => [
      'auth:api',
    ],
]);

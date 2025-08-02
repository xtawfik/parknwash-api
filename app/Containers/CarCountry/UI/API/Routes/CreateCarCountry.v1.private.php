<?php

/**
 * @apiGroup           CarCountry
 * @apiName            createCarCountry
 *
 * @api                {POST} /v1/car_country Endpoint title here..
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
$router->post('car_country', [
    'as' => 'api_carcountry_create_car_country',
    'uses'  => 'Controller@createCarCountry',
    'middleware' => [
      'auth:api',
    ],
]);

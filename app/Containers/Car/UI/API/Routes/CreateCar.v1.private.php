<?php

/**
 * @apiGroup           Car
 * @apiName            createCar
 *
 * @api                {POST} /v1/car Endpoint title here..
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
$router->post('car', [
    'as' => 'api_car_create_car',
    'uses'  => 'Controller@createCar',
    'middleware' => [
      'auth:api',
    ],
]);

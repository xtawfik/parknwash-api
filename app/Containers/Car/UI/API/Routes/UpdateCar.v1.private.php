<?php

/**
 * @apiGroup           Car
 * @apiName            updateCar
 *
 * @api                {POST} /v1/car/:id Endpoint title here..
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
$router->post('car/{id}', [
    'as' => 'api_car_update_car',
    'uses'  => 'Controller@updateCar',
    'middleware' => [
      'auth:api',
    ],
]);

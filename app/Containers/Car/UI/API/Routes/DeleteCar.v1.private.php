<?php

/**
 * @apiGroup           Car
 * @apiName            deleteCar
 *
 * @api                {DELETE} /v1/car/:id Endpoint title here..
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
$router->delete('car/{id}', [
    'as' => 'api_car_delete_car',
    'uses'  => 'Controller@deleteCar',
    'middleware' => [
      'auth:api',
    ],
]);

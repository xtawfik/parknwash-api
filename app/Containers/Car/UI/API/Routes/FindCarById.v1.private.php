<?php

/**
 * @apiGroup           Car
 * @apiName            findCarById
 *
 * @api                {GET} /v1/car/:id Endpoint title here..
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
$router->get('car/{id}', [
    'as' => 'api_car_find_car_by_id',
    'uses'  => 'Controller@findCarById',
    'middleware' => [
      'auth:api',
    ],
]);

<?php

/**
 * @apiGroup           Car
 * @apiName            getAllCars
 *
 * @api                {GET} /v1/car Endpoint title here..
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
$router->get('car', [
    'as' => 'api_car_get_all_cars',
    'uses'  => 'Controller@getAllCars',
    'middleware' => [
//      'auth:api',
    ],
]);

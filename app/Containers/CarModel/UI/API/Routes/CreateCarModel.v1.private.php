<?php

/**
 * @apiGroup           CarModel
 * @apiName            createCarModel
 *
 * @api                {POST} /v1/car_model Endpoint title here..
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
$router->post('car_model', [
    'as' => 'api_carmodel_create_car_model',
    'uses'  => 'Controller@createCarModel',
    'middleware' => [
      'auth:api',
    ],
]);

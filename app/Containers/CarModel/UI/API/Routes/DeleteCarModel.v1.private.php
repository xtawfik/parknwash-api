<?php

/**
 * @apiGroup           CarModel
 * @apiName            deleteCarModel
 *
 * @api                {DELETE} /v1/car_model/:id Endpoint title here..
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
$router->delete('car_model/{id}', [
    'as' => 'api_carmodel_delete_car_model',
    'uses'  => 'Controller@deleteCarModel',
    'middleware' => [
      'auth:api',
    ],
]);

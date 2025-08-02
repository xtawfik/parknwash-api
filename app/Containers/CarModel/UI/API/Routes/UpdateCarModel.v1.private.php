<?php

/**
 * @apiGroup           CarModel
 * @apiName            updateCarModel
 *
 * @api                {POST} /v1/car_model/:id Endpoint title here..
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
$router->post('car_model/{id}', [
    'as' => 'api_carmodel_update_car_model',
    'uses'  => 'Controller@updateCarModel',
    'middleware' => [
      'auth:api',
    ],
]);

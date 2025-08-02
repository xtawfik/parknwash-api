<?php

/**
 * @apiGroup           CarModel
 * @apiName            findCarModelById
 *
 * @api                {GET} /v1/car_model/:id Endpoint title here..
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
$router->get('car_model/{id}', [
    'as' => 'api_carmodel_find_car_model_by_id',
    'uses'  => 'Controller@findCarModelById',
    'middleware' => [
      'auth:api',
    ],
]);

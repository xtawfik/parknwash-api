<?php

/**
 * @apiGroup           Model
 * @apiName            getAllModels
 *
 * @api                {GET} /v1/car_model Endpoint title here..
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
$router->get('car_model', [
    'as' => 'api_car_model_get_all_car_models',
    'uses'  => 'Controller@getAllCarModels',
    'middleware' => [
      'auth:api',
    ],
]);
